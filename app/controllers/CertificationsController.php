<?php

class CertificationsController extends BaseController
{
    public function __construct()
    {
        Breadcrumbs::addCrumb('Dashboard', '/');
        Breadcrumbs::addCrumb('Certifications', route('certifications.index'));
    }

    public function index()
    {
        $certifications = Certification::all();
        return View::make('certifications.index', ['certifications' => $certifications]);
    }

    public function show($id)
    {
        $certification = Certification::findOrFail($id);
        Breadcrumbs::addCrumb($certification->title, route('certifications.show', $certification->id));
        return View::make('certifications.show', ['certification' => $certification]);
    }
}