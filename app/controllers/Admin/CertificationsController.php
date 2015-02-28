<?php
namespace Admin;


class CertificationsController extends \BaseController
{

    public function index()
    {
        $certifications = \Certification::paginate(25);
        dd($certifications);
        return \View::make('admin.certifications.index')->with('certifications', $certifications);
    }

    public function create()
    {
        return \View::make('admin.certifications.create', array('rules' => $this->$rules));
    }

    public function store()
    {
        $formData = \Input::all();
        $certification = new \Certification($formData);
        $certification->save();
        Notify::info('Certification  ' . Input::get('name') . ' created successfully!');
        return \Redirect::route('certifications.index');
    }

    public function show($id)
    {
        $certification = \Certification::findOrFail($id);
        return \View::make('admin.certifications..show', array('certification' => $certification));
    }

    public function edit($id)
    {
        $certification = \Certification::findOrFail($id);
        return \View::make('admin.certifications..edit', array('certification' => $certification));
    }

    public function update($id)
    {
        $certification = \Certification::findOrFail($id);
        $formData = \Input::all();
        $certification->update($formData);
        Notify::info('Certification  ' . Input::get('name') . ' updated successfully!');
        return \Redirect::route('certifications.index');
    }

    public function destroy($id)
    {
        $certification = \Certification::findOrFail($id);
        $certification->delete();
        Notify::info('Certification deleted successfully!');
        return \Redirect::route('certifications.index');
    }
}