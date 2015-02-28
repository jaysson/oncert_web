<?php
use LaravelBook\Ardent\Ardent;

class Exam extends Ardent
{
<<<<<<< HEAD
    protected $fillable = ['course_id', 'name', 'duration'];

    public static $rules = array(
        'course_id' => 'required|integer|exists:courses,id',
=======
    protected $fillable = ['certification_id', 'name', 'duration'];

    public static $rules = array(
        'certification_id' => 'required|integer|exists:certifications,id',
>>>>>>> Added APIs
        'name' => 'required',

    );

    public function course()
    {
        return $this->belongsTo('Course');
    }

    public function question()
    {
        return $this->hasMany('Question');
    }
}