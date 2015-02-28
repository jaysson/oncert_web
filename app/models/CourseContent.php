<?php
use LaravelBook\Ardent\Ardent;

class CourseContent extends Ardent
{
    protected $fillable = ['course_id', 'title', 'description'];

    public static $rules = array(
        'course_id' => 'required|integer|exists:courses,id',
        'title' => 'required'
    );

    public function course()
    {
        return $this->belongsTo('Course');
    }

    public function courseSession()
    {
        return $this->hasMany('CourseSession');
    }
}