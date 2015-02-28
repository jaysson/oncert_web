<?php

use LaravelBook\Ardent\Ardent;

class Attempt extends Ardent
{
    protected $fillable = ['start', 'end', 'exam_id'];

    public static $rules = array(
        'exam_id' => 'required|integer|exists:exams,id',
        'title' => 'required'
    );

    public function exam()
    {
        return $this->belongsTo('Exam');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }


}