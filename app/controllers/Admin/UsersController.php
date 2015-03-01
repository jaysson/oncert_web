<?php
namespace Admin;
use Input;

class UsersController extends \BaseController
{

    public function index()
    {
        $users = \User::paginate(25);
        return \View::make('admin.users.index')->with('users', $users);
    }

    public function show($id)
    {
        $user = \User::findOrFail($id);
        return \View::make('admin.users..show', array('user' => $user));
    }

    public function edit($id)
    {
        $user = \User::findOrFail($id);
        return \View::make('admin.users..edit', array('user' => $user));
    }

    public function update($id)
    {
        \User::$rules['password'] = '';
        \User::$rules['email'] = 'required|email';
        $user = \User::findOrFail($id);
        $formData = \Input::all();
//        dd($formData);
        $user->update($formData);
        \Notification::info('User  ' . Input::get('name') . ' updated successfully!');
        return \Redirect::route('admin.users.index');
    }

    public function destroy($id)
    {
        $user = \User::findOrFail($id);
        $user->delete();
        \Notification::info('User deleted successfully!');
        return \Redirect::route('admin.users.index');
    }
}