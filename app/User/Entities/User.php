<?php

namespace App\User\Entities;

use Laravel\Passport\HasApiTokens;
use App\Profile\Entities\Profile;
use App\Property\Entities\Property;
use App\Message\Entities\Message;
use App\Notifications\Entities\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject as JWTSubject;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    const USER_VERIFIED = '1';
    const USER_NOT_VERIFIED = '0';

    const USER_ACTIVATED = '1';
    const USER_NOT_ACTIVATED = '0';

    const EMAIL = 'jorgemedina2406@gmail.com';

    // public $transformer = UserTransformer::class;

    protected $table = 'users';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'activated',
        'role',
        'verification_token',
        'login_date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    public function setEmailAttribute($valor)
    {
        $this->attributes['email'] = strtolower($valor);
    }

    public function isVerified()
    {
        return $this->verified == User::USER_VERIFIED;
    }

    public static function generateVerificationToken()
    {
        return Str::random(40);
    }

    /**
     * Override the mail body for reset password notification mail.
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\MailResetPasswordNotification($token));
    }


    /** RELATIONS **/

    /**
     * Relationship with the Profile entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Relationship with the Profile entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    /**
     * Relationship with the Message entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Relationship with the Notification entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
