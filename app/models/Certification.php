<?php
use LaravelBook\Ardent\Ardent;

class Certification extends Ardent
{
    protected $fillable = ['title', 'course_id'];

    public static $rules = array(
        'course_id' => 'required|integer|exists:courses,id',
        'title' => 'required'
    );

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function course()
    {
        return $this->belongsTo('Course');
    }


}