<?php

class SessionsController extends BaseController
{
    public function __construct(){
        Breadcrumbs::addCrumb('Dashboard', '/');
        Breadcrumbs::addCrumb('Certifications', route('certifications.index'));

    }
    public function index($certification_id)
    {
        $certification = Certification::findOrFail($certification_id);
        Breadcrumbs::addCrumb('Sessions', route('certifications.sessions.index', $certification_id));
        return View::make('sessions.index', ['sessions' => $certification->sessions, 'certification' => $certification]);
    }

    public function create($certification_id)
    {
        $certification = Certification::findOrFail($certification_id);
        Breadcrumbs::addCrumb('Sessions', route('certifications.sessions.index', $certification_id));
        Breadcrumbs::addCrumb('Create Session', route('certifications.sessions.create', $certification_id));
        return View::make('sessions.create', ['certification' => $certification]);
    }

    public function store($certification_id)
    {
        $certification = Certification::findOrFail($certification_id);
        $session = new CourseSession();
        $session->certification_id = $certification->id;
        $session->user_id = Auth::id();
        if ($session->save()) {
            Notification::success('Successfully created session!');
            return Redirect::route('certifications.sessions.index', $certification_id);
        } else {
            return Redirect::back()->withInput()->withErrors($session->errors());
        }
    }

    public function show($certification_id, $session_id)
    {
        $session = CourseSession::findOrFail($session_id);
        Breadcrumbs::addCrumb('Sessions', route('certifications.sessions.index', $certification_id));
        Breadcrumbs::addCrumb('Create Session', route('certifications.sessions.show', $certification_id, $session_id));
        return View::make('sessions.show', ['session' => $session]);
    }

    public function edit($certification_id, $session_id)
    {
        $session = CourseSession::findOrFail($session_id);
        Breadcrumbs::addCrumb('Sessions', route('certifications.sessions.index', $certification_id));
        Breadcrumbs::addCrumb('Edit Session', route('certifications.sessions.edit', $certification_id, $session_id));
        return View::make('sessions.edit', ['session' => $session]);
    }

    public function update($certification_id, $session_id)
    {
        $session = CourseSession::findOrFail($session_id);
        if ($session->save()) {
            Notification::success('Successfully updated session!');
            return Redirect::route('certifications.sessions.index', $certification_id);
        } else {
            return Redirect::back()->withInput()->withErrors($session->errors());
        }
    }

    public function destroy($certification_id, $session_id)
    {
        $session = CourseSession::findOrFail($session_id);
        $session->delete();
        Notification::success('Session deleted!');
        return Redirect::route('certifications.sessions.index');
    }

    public function join($session_id)
    {
        $session = CourseSession::findOrFail($session_id);
        $session->users()->attach(Auth::id());
        Notification::success('You have successfully joined the session!');
        return Redirect::back();
    }
}