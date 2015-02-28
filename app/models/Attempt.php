<?php

use LaravelBook\Ardent\Ardent;

class Attempt extends Ardent
{
    protected $fillable = ['start', 'end', 'exam_id', 'user_id'];

    public static $rules = array(
        'exam_id' => 'required|integer|exists:exams,id',
        'user_id' => 'required|integer|exists:users,id',
        'start' => 'required',
        'end' => 'required'

    );

    public function exam()
    {
        return $this->belongsTo('Exam');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function answers()
    {
        return $this->belongsToMany('Answer');
    }

    public function toArray()
    {
        return array(
            'exam_id' => $this->exam_id,
            'user_id' => $this->user_id,
            'start' => $this->start,
            'end' => $this->end,
            'questions' => $this->exam->questions
        );
    }

}