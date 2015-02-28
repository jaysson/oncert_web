<?php

namespace Api;


use Oneducation\Api\ResponseTrait;

class SessionsController extends \BaseController
{

    use ResponseTrait;

    public function index()
    {
        if ($sessions = \CourseSession::all()) {
            return $this->respondWithData($sessions);
        } else {
            return $this->respondWithError('Empty', Response::HTTP_NOT_FOUND);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $session = \CourseSession::firstOrCreate(\Input::all());
        if ($session->exists) {
            return $this->respondWithSuccess('Your Sessions saved Successfully');
        } else {
            return $this->respondWithError('Your Sessions could not be saved.');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $session = \CourseSession::findOrFail($id);
        $data = \Input::all();
        if ($session->update($data)) {
            return $this->respondWithSuccess('Your Sessions updated Successfully');
        } else {
            return $this->respondWithError('Your Sessions could not be Updated.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $session = \CourseSession::findOrFail($id);
        if ($session->delete()) {
            return $this->respondWithSuccess('Your Sessions Deleted Successfully');
        } else {
            return $this->respondWithError('Your Sessions Deletion Fails.');
        }
    }


    public function joinSession($id)
    {
        $session = \CourseSession::findOrFail($id);
        $user_id = \Auth::id();
        $session->users()->attach($user_id);
        return $this->respondWithSuccess('Your Sessions Saved Successfully');

    }
}
