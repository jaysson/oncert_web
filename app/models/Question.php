<?php
use LaravelBook\Ardent\Ardent;

class Question extends Ardent
{
    protected $fillable = ['exam_id','title','description','status'];

    public static $rules = array(
        'exam_id' => 'required|integer|exists:users,id',
        'title' => 'required',

    );
    public function exam()
    {
        return $this->belongsTo('Exam');
    }


}