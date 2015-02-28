<?php

use Wicva\Services\User as UserService;

/**
 * Class UsersController
 */
class UsersController extends \BaseController
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->beforeFilter(function () {
            $this->checkAccess('manage_users');
        });
    }

    /**
     * Display a listing of the resource.
     * GET /users
     *
     * @return Response
     */
    public function index()
    {
        $users = User::paginate(25);
        return View::make('users.list')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     * GET /users/create
     *
     * @return Response
     */
    public function create()
    {
        $roles = [];
        foreach (Role::all() as $role) {
            $roles[$role->id] = $role->name;
        }
        return View::make('users.create', [
            'roles' => $roles,
            'segments' => Segment::getNestedList('name', 'id', ' — ')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * POST /users
     *
     * @return Response
     */
    public function store()
    {
        $userParams = array(
            'email' => Input::get('email'),
            'name' => Input::get('name'),
            'password' => str_random(8),
            'activated' => true,
        );
        $user = new User($userParams);
        $this->userService->create($userParams, (array)Input::get('roles'), (array)Input::get('segments'));
        Notify::info('User ' . $userParams['name'] . 'created successfully!');
        return Redirect::route('users.index');
    }

    /**
     * Display the specified resource.
     * GET /users/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $segments = implode(', ', array_map(function ($segment) {
            return $segment['name'];
        }, $user->segments->toArray()));
        return View::make('users.show', array('user' => $user, 'segment' => $segments));
    }

    /**
     * Show the form for editing the specified resource.
     * GET /users/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = [];
        foreach (Role::all() as $role) {
            $roles[$role->id] = $role->name;
        }
        return View::make('users.edit', [
            'user' => $user,
            'roles' => $roles,
            'segments' => Segment::getNestedList('name', 'id', ' — ')
        ]);
    }

    /**
     * Update the specified resource in storage.
     * PUT /users/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $user = User::findOrFail($id);

        $userParams = Input::only(['email', 'name']);

        $pass = Input::get('password');
        if (!empty($pass)) {
            $userParams['password'] = $pass;
        }

        $this->userService->update($user, $userParams, Input::get('roles'), Input::get('segments'));

        Notify::info('Updated user ' . $user->name);

        return Redirect::route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /users/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // redirect
        Notify::info('User deleted successfully!');
        return Redirect::route('users.index');
    }

}