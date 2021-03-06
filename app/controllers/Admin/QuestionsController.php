<?php

namespace Admin;

use Input;
use Breadcrumbs;

class QuestionsController extends \BaseController
{

    public function index($exam_id)
    {
        $questions = \Question::paginate(25);
        Breadcrumbs::addCrumb('Dashboard', '/admin');
        Breadcrumbs::addCrumb('Exams', route('admin.exams.index'));
        Breadcrumbs::addCrumb('Questions', route('admin.exams.questions.index', [$exam_id]));
        return \View::make('admin.questions.index', array('questions' => $questions,'exam_id'=>$exam_id));
    }

    public function create($exam_id)
    {
        Breadcrumbs::addCrumb('Dashboard', '/admin');
        Breadcrumbs::addCrumb('Exams', route('admin.exams.index'));
        Breadcrumbs::addCrumb('Questions', route('admin.exams.questions.index', [$exam_id]));
        Breadcrumbs::addCrumb('New Question', route('admin.exams.questions.create', [$exam_id]));
        return \View::make('admin.questions.create', array('rules' => \Exam::$rules,'exam_id' =>$exam_id));
    }

    public function store($exam_id)
    {
        $formData = \Input::all();
        $question = new \Question($formData);
        $question->exam_id = $exam_id;
        $question->save();
        \Notification::info('Question ' . Input::get('name') . ' created successfully!');
        return \Redirect::route('admin.exams.questions.index', array($exam_id));
    }

    public function show($exam_id, $id)
    {
        $question = \Question::findOrFail($id);
        Breadcrumbs::addCrumb('Dashboard', '/admin');
        Breadcrumbs::addCrumb('Exams', route('admin.exams.index'));
        Breadcrumbs::addCrumb('Questions', route('admin.exams.questions.index', [$exam_id]));
        Breadcrumbs::addCrumb($question->title, route('admin.exams.questions.show', [$exam_id, $id]));
        return \View::make('admin.questions.show', array('question' => $question));
    }

    public function edit($exam_id, $id)
    {
        Breadcrumbs::addCrumb('Dashboard', '/admin');
        Breadcrumbs::addCrumb('Exams', route('admin.exams.index'));
        Breadcrumbs::addCrumb('Questions', route('admin.exams.questions.index', [$exam_id]));
        Breadcrumbs::addCrumb('Editing Question', route('admin.exams.questions.edit', [$exam_id, $id]));
        $question = \Question::findOrFail($id);
        return \View::make('admin.questions.edit', array('question' => $question));
    }

    public function update($exam_id, $id)
    {
        $question = \Question::findOrFail($id);
        $formData = \Input::all();
        $question->update($formData);
        \Notification::info('Question  ' . Input::get('name') . ' updated successfully!');
        return \Redirect::route('admin.exams.questions.index', array($exam_id, $id));
    }

    public function destroy($exam_id, $id)
    {
        $question = \Question::findOrFail($id);
        $question->delete();
        \Notification::info('Question deleted successfully!');
        return \Redirect::route('admin.exams.questions.index', array($exam_id, $id));
    }
}