<?php
use LaravelBook\Ardent\Ardent;

class Exam extends Ardent
{
    protected $fillable = ['certification_id', 'name', 'duration'];

    public static $rules = array(
        'certification_id' => 'required|integer|exists:certifications,id',
        'name' => 'required'
    );

    public function certification()
    {
        return $this->belongsTo('Certification');
    }


    public function questions()
    {
        return $this->hasMany('Question');
    }
}