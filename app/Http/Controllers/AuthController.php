<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User\Entities\User;

use Hash;
use Illuminate\Auth\Events\PasswordReset;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;

class AuthController extends Controller
{

    use SendsPasswordResetEmails;

    /**
     * Send password reset link. 
     */
    public function sendPasswordResetLink(Request $request)
    {
        return $this->sendResetLinkEmail($request);
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response()->json([
            'message' => 'Password reset email sent.',
            'data' => $response
        ]);
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Email could not be sent to this email address.']);
    }

    /**
     * Handle reset password 
     */
    public function callResetPassword(Request $request)
    {
        return $this->reset($request);
    }


    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = bcrypt($password);
        $user->save();
        event(new PasswordReset($user));
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Password reset successfully.']);
    }
    /**
     * Get the response for a failed password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Failed, Invalid Token.']);
    }

    /**
     * Redirect provider
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getSocialRedirect(Request $request)
    {

        $fb = new FacebookFacebook([
            'app_id' => "585298648539423",
            'app_secret' => "81246616b95c964b4f2a3ec1125921b3",
            'default_graph_version' => 'v2.12',
        ]);

        try {
            $fbresponse = $fb->get('/me?fields=id,name,email', $request->token);

            $me = $fbresponse->getGraphUser();
            // $userId = $me->getId();
            // $email = $me->getEmail();  
            // $name = $user->name();



            \Log::debug('User', [$userId]);

        } catch (FacebookExceptionsFacebookResponseException $e) {
                //Handle this error, return a failed request to the app with either 401 or 500
        } catch (FacebookExceptionsFacebookSDKException $e) {
                //Handle this error, return a 500 error – something is wrong with your code
        }

        // Socialite::driver('facebook')->stateless()->redirect();
        // $providerKey = Config::get('services.' . $provider);
        // if (empty($providerKey)) {
        //     return view('home')
        //     ->with('error','No such provider');
        // }
        // return Socialite::driver( $provider )->redirect();

        return $me;

    }

    /**
     * Login by Google
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getSocialHandle($provider)
    {
        // if (\Input::get('denied') != ''){
        //     abort(500, "No le diste permiso a nuestra aplicación para acceder a tu cuenta.");
        // }else{

            
            $user = Socialite::driver('facebook')->stateless()->user();
            \Log::debug('USUARIO',[$user]);

            //Datos de usuario retornados por el proveedor de servicio
        // $socialUser = Socialite::driver($provider)->user();

            //Verifica si el email ya lo tiene un usuario

            // if(!$this->usersRepo->userExistsByEmail($socialUser->getEmail())) {//Si no lo tiene crea el usuatrio

            //     \Log::debug('USER SOCIAL',[$socialUser]);
            //     $email       = $socialUser->getEmail();
            //     $key         = \Uuid::generate(4)->string;
            //     $password    = bcrypt(str_random(16));
            //     $token       = str_random(64);
            //     $email_token = base64_encode($email);
            //     $name        = $socialUser->name;
            //     $verified    = 1;
            //     $status      = 1;
            //     $type        = 1;

            //     $create_user = $this->usersRepo->createUser($email, $password, $key,  $username, $verified, $type, $email_token, $status);

            // }else{

            //     return redirect()->back()->with('message', 'Error al loguearse por medio de google');
            // }

        // }

        //     \Auth::loginUsingId($create_user->id);
        // return redirect('/paciente');//Redirecciona al home
    }
}
