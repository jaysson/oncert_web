<?php

namespace Admin;
use Input;
use Breadcrumbs;

class ExamsController  extends \BaseController
{

    public function index()
    {
        $exams = \Exam::paginate(25);
        Breadcrumbs::addCrumb('Dashboard', '/admin');
        Breadcrumbs::addCrumb('Exams', route('admin.exams.index'));
        return \View::make('admin.exams.index',array('exams' => $exams));
    }

    public function create()
    {
        $certifications = array('' => 'Select Certification Name') + \Certification::lists('title', 'id');
        Breadcrumbs::addCrumb('Dashboard', '/admin');
        Breadcrumbs::addCrumb('Exams', route('admin.exams.index'));
        Breadcrumbs::addCrumb('Create', route('admin.exams.create'));
        return \View::make('admin.exams.create', array('rules' => \Exam::$rules,'certifications' => $certifications));
    }

    public function store()
    {
        $formData = \Input::all();
        $exam = new \Exam($formData);
        $exam->save();
        \Notification::info('Exam  ' . Input::get('name') . ' created successfully!');
        return \Redirect::route('admin.exams.index');
    }

    public function show($id)
    {
        $exam = \Exam::findOrFail($id);
        Breadcrumbs::addCrumb('Dashboard', '/admin');
        Breadcrumbs::addCrumb('Exams', route('admin.exams.index'));
        Breadcrumbs::addCrumb('Questions', route('admin.exams.show', $id));
        return \View::make('admin.exams.show', array('exam' => $exam));
    }

    public function edit($id)
    {
        $certifications = array('' => 'Select Certification Name') + \Certification::lists('title', 'id');
        $exam = \Exam::findOrFail($id);
        Breadcrumbs::addCrumb('Dashboard', '/admin');
        Breadcrumbs::addCrumb('Exams', route('admin.exams.index'));
        Breadcrumbs::addCrumb('Editing Exam', route('admin.exams.edit', $id));
        return \View::make('admin.exams.edit', array('exam' => $exam,'certifications' => $certifications));
    }

    public function update($id)
    {
        $exam = \Exam::findOrFail($id);
        $formData = \Input::all();
        $exam->update($formData);
        \Notification::info('Exam  ' . Input::get('name') . ' updated successfully!');
        return \Redirect::route('admin.exams.index');
    }

    public function destroy($id)
    {
        $exam = \Exam::findOrFail($id);
        $exam->delete();
        \Notification::info('Exam deleted successfully!');
        return \Redirect::route('admin.exams.index');
    }
}