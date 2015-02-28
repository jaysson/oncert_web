<?php
use LaravelBook\Ardent\Ardent;

class Certification extends Ardent
{
    protected $fillable = ['title'];

    public static $rules = array(
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