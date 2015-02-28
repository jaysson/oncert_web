<?php
use LaravelBook\Ardent\Ardent;

class Answer extends Ardent
{
    protected $fillable = ['question_id', 'title', 'correct'];

    public static $rules = array(
        'question_id' => 'required|integer|exists:questions,id',
        'title' => 'required'
    );

    public function question()
    {
        return $this->belongsTo('Question');
    }


}