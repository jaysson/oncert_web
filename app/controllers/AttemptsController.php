<?php

class AttemptsController extends BaseController
{
    use \Oneducation\Api\ResponseTrait;

    public function __construct()
    {
        Breadcrumbs::addCrumb('Dashboard', '/dashboard');
    }

    public function index($certification_id, $exam_id)
    {
        $exam = Exam::findOrFail($exam_id);
        Breadcrumbs::addCrumb('Certifications', route('certifications.index'));
        Breadcrumbs::addCrumb('Exams', route('certifications.exams.index', $certification_id));
        Breadcrumbs::addCrumb('Attempts', route('certifications.exams.attempts.index', $certification_id, $exam_id));
        $attempts = \Attempt::where('user_id', '=', \Auth::id())->where('exam_id', $exam_id)->get();
        return View::make('attempts.index', ['attempts' => $attempts, 'exam' => $exam]);
    }

    public function store($certification_id, $exam_id)
    {
        $user_id = \Auth::id();
        $attempt = new \Attempt(['user_id' => $user_id, 'exam_id' => $exam_id, 'start' => \Carbon\Carbon::now()]);
        if ($attempt->save()) {
            return View::make('attempts.create', ['attempt' => $attempt]);
        } else {
            return Redirect::back()->withInput()->withErrors($attempt->errors());
        }
    }

    public function update($certification_id, $exam_id, $id)
    {
        $attempt = \Attempt::findOrFail($id);
        $answer = \Answer::findOrFail(\Input::get('answer_id'));
        $question_ids = $attempt->exam->questions()->lists('id');
        if (in_array($answer->question_id, $question_ids)) {
            $question = $answer->question;
            $attempt->answers()->detach($question->answers()->lists('id'));
            $attempt->answers()->attach($answer->id);
            return $this->respondWithSuccess('Attempted');
        } else {
            return $this->respondWithError('Invalid question');
        }
    }
}