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
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required'
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
            'url' => '/images/profile-picture/:id/:style.:extension',
        ]);

        $this->hasAttachedFile('id_proof', [
            'styles' => [
                'thumbnail' => '240x180#',
                'small' => '120x90'
            ],
            'url' => '/images/id-proof/:id/:style.:extension',
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
    public function sessions()
    {
        return $this->belongsToMany('CourseSession','session_user');
    }

    public function certification()
    {
        return $this->belongsToMany('Certification');
    }

    public function exam()
    {
        return $this->belongsToMany('Exam');
    }
}
