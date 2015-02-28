<?php
use LaravelBook\Ardent\Ardent;

class CourseSession extends Ardent
{
    protected $fillable = ['course_id', 'title', 'start', 'end', 'status'];

    public static $rules = array(
        'course_id' => 'required|integer|exists:courses,id',
        'title' => 'required',
        'start' => 'required',
        'end' => 'required'
    );

    public function courseContent()
    {
        return $this->hasMany('CourseContent');
    }

    public function attachment()
    {
        return $this->hasMany('Attachment');
    }

    public function message()
    {
        return $this->hasMany('Message');
    }
}