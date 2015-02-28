<?php
use LaravelBook\Ardent\Ardent;

class Exam extends Ardent
{
    protected $fillable = ['course_id', 'name', 'duration'];

    public static $rules = array(
        'course_id' => 'required|integer|exists:courses,id',
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