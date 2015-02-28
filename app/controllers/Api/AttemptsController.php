<?php
namespace Api;

use Former\Form\Fields\Input;
use Oneducation\Api\ResponseTrait;


class AttemptsController extends \BaseController
{

    use ResponseTrait;

    public function index()
    {
        $attempts = \Attempt::where('user_id', '=', \Auth::id())->get();
        return $this->respondWithData($attempts);
    }

    public function store()
    {
        $user_id = \Auth::id();
        $exam_id = \Input::get('exam_id');
        if (\Attempt::create(['user_id' => $user_id, 'exam_id' => $exam_id])) {
            return $this->respondWithSuccess('Successfully Applied for Exam');
        } else {
            return $this->respondWithError('Error While Apply for Exam');
        }
    }

    public function update($id)
    {
        $attempt = \Attempt::findOrFail($id);
        $answer = \Answer::findOrFail(\Input::get('answer_id'));
        $question_ids = $attempt->exam->questions()->lists('id');
        if(in_array($answer->question_id,$question_ids)){
            $question = $answer->question;
            $attempt->answers()->detach($question->answers()->lists('id'));
            $attempt->answers()->attach($answer->id);
            return $this->respondWithSuccess('Attempted');
        }
        else{
            return $this->respondWithError('Sorry');
        }



    }
}