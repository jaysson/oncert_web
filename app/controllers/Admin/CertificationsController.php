<?php
namespace Admin;

use Input;
use Breadcrumbs;

class CertificationsController extends \BaseController
{

    public function index()
    {
        $certifications = \Certification::paginate(25);
        Breadcrumbs::addCrumb('Dashboard', '/admin');
        Breadcrumbs::addCrumb('Certifications', route('admin.certifications.index'));
        return \View::make('admin.certifications.index')->with('certifications', $certifications);
    }

    public function create()
    {
        Breadcrumbs::addCrumb('Dashboard', '/admin');
        Breadcrumbs::addCrumb('Certifications', route('admin.certifications.index'));
        Breadcrumbs::addCrumb('Create', route('admin.certifications.create'));
        return \View::make('admin.certifications.create', array('rules' => \Certification::$rules));
    }

    public function store()
    {
        $formData = \Input::all();
        $certification = new \Certification($formData);
        $certification->save();
        \Notification::info('Certification  ' . Input::get('name') . ' created successfully!');
        return \Redirect::route('admin.certifications.index');
    }

    public function show($id)
    {
        $certification = \Certification::findOrFail($id);
        Breadcrumbs::addCrumb('Dashboard', '/admin');
        Breadcrumbs::addCrumb('Certifications', route('admin.certifications.index'));
        Breadcrumbs::addCrumb($certification->title, route('admin.certifications.show', $id));
        return \View::make('admin.certifications..show', array('certification' => $certification));
    }

    public function edit($id)
    {
        $certification = \Certification::findOrFail($id);
        $certification = \Certification::findOrFail($id);
        Breadcrumbs::addCrumb('Dashboard', '/admin');
        Breadcrumbs::addCrumb('Certifications', route('admin.certifications.index'));
        Breadcrumbs::addCrumb('Editing Certification', route('admin.certifications.edit', $id));
        return \View::make('admin.certifications..edit', array('certification' => $certification));
    }

    public function update($id)
    {
        $certification = \Certification::findOrFail($id);
        $formData = \Input::all();
        $certification->update($formData);
        \Notification::info('Certification  ' . Input::get('name') . ' updated successfully!');
        return \Redirect::route('admin.certifications.index');
    }

    public function destroy($id)
    {
        $certification = \Certification::findOrFail($id);
        $certification->delete();
        \Notification::info('Certification deleted successfully!');
        return \Redirect::route('admin.certifications.index');
    }
}