<?php

namespace Admin;

use Input;


class AnswersController extends \BaseController
{

    public function index($exam_id, $question_id)
    {
        $question = \Question::findOrFail($question_id);
        return \View::make('admin.answers.index', array('answers' => $question->answers, 'question' => $question));
    }

    public function create($exam_id, $question_id)
    {
        return \View::make('admin.answers.create', array('rules' => \Exam::$rules, 'exam_id' => $exam_id, 'question_id' => $question_id));
    }

    public function store($exam_id, $question_id)
    {
        $formData = \Input::all();
        $answer = new \Answer($formData);
        $answer->question_id = $question_id;
        $answer->save();
        \Notification::info('Question ' . Input::get('name') . ' created successfully!');
        return \Redirect::route('admin.exams.questions.answers.index', array($exam_id, $question_id));
    }

    public function show($exam_id, $question_id, $id)
    {
        $answer = \Answer::findOrFail($id);
        $question = \Question::findOrFail($question_id);
        return \View::make('admin.answers.show', array('answer' => $answer, 'question' => $question));
    }

    public function edit($exam_id, $question_id, $id)
    {
        $answer = \Answer::findOrFail($id);
        $question = \Question::findOrFail($question_id);

        return \View::make('admin.answers.edit', array('answer' => $answer, 'question' => $question));
    }

    public function update($exam_id, $question_id, $id)
    {
        $answer = \Answer::findOrFail($id);
        $formData = \Input::all();
        $answer->update($formData);
        \Notification::info('Answer  ' . Input::get('name') . ' updated successfully!');
        return \Redirect::route('admin.exams.questions.answers.index',array($exam_id, $question_id));
    }

    public function destroy($exam_id, $question_id, $id)
    {
        $answer = \Answer::findOrFail($id);
        $answer->delete();
        \Notification::info('Answer deleted successfully!');
        return \Redirect::route('admin.answers.index');
    }
}