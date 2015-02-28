<?php
use Codesleeve\Stapler\ORM\EloquentTrait;
use LaravelBook\Ardent\Ardent;

class Question extends Ardent implements \Codesleeve\Stapler\ORM\StaplerableInterface
{
    use EloquentTrait;
    protected $fillable = ['exam_id', 'title', 'description', 'status'];

    public static $rules = array(
        'exam_id' => 'required|integer|exists:users,id',
        'title' => 'required',

    );

    public function __construct(array $attributes = array())
    {
        $this->hasAttachedFile('snap_shot', [
            'styles' => [
                'thumbnail' => '240x180#',
                'small' => '120x90'
            ],
            'url' => '/images/questions/:id.:extension',
        ]);

        parent::__construct($attributes);
    }

    public function exam()
    {
        return $this->belongsTo('Exam');
    }


    public function answers()
    {
        return $this->hasMany('Answer');
    }

    public function toArray()
    {
        return array(
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'snap_shot' => $this->snap_shot->url(),
            'answers' => $this->answer
        );
    }
}