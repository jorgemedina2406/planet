<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Users\Entities\User;

use App\User\Repositories\UserRepo;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * @var UsersRepo
     */
    private $usersRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepo $usersRepo)
    {
        $this->middleware('guest')->except('logout');
        $this->usersRepo = $usersRepo;

    }

    public function index()
    {
        return view('admin.auth.login.login');
    }

    /**
     * Login
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {

        $v = \Validator::make($request->all(), [

            'email' => 'required',
            'password' => 'required'

        ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $email       = $request->email;
        $password    = $request->password;
        $user        = $this->usersRepo->getUserByEmail($email);
        $credentials = ['email' => $email, 'password' => $password];
        try {
            if ($user) {
                if ($user->activated) {
                    if (\Auth::attempt($credentials)) {

                        $login_date = Carbon::now();
                        // $login_date = $dateNow->format('d-m-Y');

                        $user->update([
                            'login_date' => $login_date
                        ]);

                        $user->save();

                        return redirect()->route('dashboard');

                    } else {

                        \Auth::logout();
                        \Session::flush();

                        return redirect()->back()->with('message_error', 'No posee permisos para ingresar a esta sección');
                    }
                    
                } else {
                    return redirect()->back()->with('message_error', 'Cuenta inactiva');
                }
            } else {
                return redirect()->back()->with('message_error','El email o contraseña es incorrecto');
            }
        } catch (\Exception $ex) {
            \Log::error('Auth.login', ['Exception' => $ex]);
            return redirect()->back()->with('message_error', _('Error accediendo al sistema'));
        }
    }

    /**
     * Logout
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        \Auth::logout();

        return redirect()->intended('/')->with('message_error', 'Tu sesión ha sido cerrada.');

    }
}
