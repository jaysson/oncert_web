<?php
use LaravelBook\Ardent\Ardent;

class Tag extends Ardent
{
    protected $fillable = ['title'];
    public static $rules = array(
        'title' => 'required'
    );

    public function course()
    {
        return $this->belongsTo('Course');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }


}