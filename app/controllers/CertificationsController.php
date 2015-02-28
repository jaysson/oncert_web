<?php

class CertificationsController extends BaseController
{
    public function index()
    {
        $certifications = Certification::all();
        return View::make('certifications.index', ['certifications' => $certifications]);
    }

    public function show($id)
    {
        $certification = Certification::findOrFail($id);
        return View::make('certifications.show', ['certification' => $certification]);
    }
}