<?php
use LaravelBook\Ardent\Ardent;

class Exam extends Ardent
{
    protected $fillable = ['course_id', 'name', 'duration'];

    public static $rules = array(
        'certification_id' => 'required|integer|exists:certifications,id',
        'name' => 'required',

    );

    public function course()
    {
        return $this->belongsTo('Course');
    }

    public function questions()
    {
        return $this->hasMany('Question');
    }
}