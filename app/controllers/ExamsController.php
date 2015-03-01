<?php

class ExamsController extends BaseController
{
    public function index($certification_id)
    {
        Breadcrumbs::addCrumb('Dashboard', '/dashboard');
        Breadcrumbs::addCrumb('Exams', route('certifications.exams.index', $certification_id));
        $exams = Certification::findOrFail($certification_id)->exams;
        return View::make('exams.index', ['exams' => $exams]);
    }
}