<?php

class AuthToken extends Eloquent
{
    protected $fillable = ['user_id', 'token'];

    public function user()
    {
        return $this->belongsTo('User');
    }
}