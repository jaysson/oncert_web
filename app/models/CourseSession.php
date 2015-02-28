<?php
use LaravelBook\Ardent\Ardent;

class CourseSession extends Ardent
{
    protected $table = 'sessions';
    protected $fillable = ['certification_id', 'user_id', 'title', 'start', 'end', 'status'];
    public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
    public $autoPurgeRedundantAttributes = true;

    public static $rules = array(
        'certification_id' => 'required|integer|exists:certifications,id',
        'user_id' => 'required|integer|exists:users,id',
        'title' => 'required',
        'start' => 'required',
        'end' => 'required'
    );

    public function attachment()
    {
        return $this->hasMany('Attachment');
    }

    public function message()
    {
        return $this->hasMany('Message');
    }

    public function users()
    {
        return $this->belongsToMany('User', 'session_user', 'session_id');
    }

    public function trainer()
    {
        return $this->belongsTo('User', 'user_id');
    }
}