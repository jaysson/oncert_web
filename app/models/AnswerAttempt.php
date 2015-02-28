<?php

use LaravelBook\Ardent\Ardent;

class AnswerAttempt extends Ardent
{
    protected $fillable = ['answer_id', 'attempt_id'];

    public function answer()
    {
        return $this->belongsTo('Answer');
    }

    public function attempt()
    {
        return $this->belongsTo('Attempt');
    }


}