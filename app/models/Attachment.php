<?php


class Attachment extends Eloquent implements \Codesleeve\Stapler\ORM\StaplerableInterface
{
    use \Codesleeve\Stapler\ORM\EloquentTrait;
    protected $fillable = ['session_id', 'file'];

    public function __construct(array $attributes = array())
    {
        $this->hasAttachedFile('file', ['url' => '/attachments/:id.:extension']);
        parent::__construct($attributes);
    }

    public function session()
    {
        return $this->belongsTo('CourseSession', 'session_id');
    }
}