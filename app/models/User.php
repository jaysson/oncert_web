<?php

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;
use Zizaco\Entrust\HasRole;
use Codesleeve\Stapler\ORM\EloquentTrait;

class User extends Ardent implements UserInterface, RemindableInterface, StaplerableInterface
{

    use UserTrait, RemindableTrait, HasRole, EloquentTrait;
    protected $fillable = ['name', 'email', 'password', 'address_1', 'address_2', 'city', 'state', 'country', 'zip_code', 'contact_number', 'profile_picture', 'id_proof'];

    public static $rules = array(
        'name' => 'required|between:4,16',
        'email' => 'required|email',
        'password' => 'required|alpha_num|between:4,8|confirmed',
        'password_confirmation' => 'required|alpha_num|between:4,8',
        'address_1' => 'required',
        'city' => 'required',
        'state' => 'required',
        'country' => 'required',
        'zip_code' => 'required',
        'contact_number' => 'required',
        'profile_picture' => 'image',
        'id_proof' => 'image',

    );


    /***/
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public static function findOrFailByEmail($email)
    {
        return static::where('email', $email)->firstOrFail();
    }

    public function __construct(array $attributes = array())
    {
        $this->hasAttachedFile('profile_picture', [
            'styles' => [
                'thumbnail' => '240x180#',
                'small' => '120x90'
            ],
            'url' => '/images/profile-picture/:id.:extension',
        ]);

        $this->hasAttachedFile('id_proof', [
            'styles' => [
                'thumbnail' => '240x180#',
                'small' => '120x90'
            ],
            'url' => '/images/id_proof/:id.:extension',
        ]);

        parent::__construct($attributes);
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function course()
    {
        return $this->belongsToMany('Course');
    }

    public function role()
    {
        return $this->belongsToMany('Role');
    }

    public function certification()
    {
        return $this->belongsToMany('Certification');
    }

    public function exam()
    {
        return $this->belongsToMany('Exam');
    }

    public function course_session()
    {
        return $this->belongsToMany('CourseSession');
    }
}
