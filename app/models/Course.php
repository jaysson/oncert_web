<?php
use LaravelBook\Ardent\Ardent;

class Course extends Ardent
{
    protected $fillable = ['title', 'start', 'end', 'trainer_id','description','status'];

    public static $rules = array(
        'trainer_id' => 'required|integer|exists:users,id',
        'title' => 'required',
        'start' => 'required',
        'end' => 'required'
    );
    public function courseContent()
    {
        return $this->hasMany('CourseContent');
    }

    public function certification()
    {
        return $this->hasOne('Certification');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function users()
    {
        return $this->belongsToMany('User');
    }

    public function exam()
    {
        return $this->hasMany('Exam');
    }

}