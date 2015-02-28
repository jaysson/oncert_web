<?php

namespace Api;

use Input;
use Oneducation\Api\ResponseTrait;
use Auth;

class AuthController extends \BaseController
{
    use ResponseTrait;

    public function registration()
    {
        \User::$rules = ['email', 'password'];
        $credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];
//        dd($credentials);
        if ($credentials != '') {
            $result = \User::firstOrCreate($credentials);
            return $this->respondWithSuccess('Thanks for Registering on Online Education Services.');
        } else {
            return $this->respondWithError('Registration Failed');
        }
    }

    public function login()
    {
        \User::$rules = ['email', 'password'];
        $credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];
//        dd($credentials);

        if (Auth::attempt($credentials)) {
            $token = \AuthToken::create(['user_id' => Auth::id(), 'token' => str_random(60)]);
            return $this->respondWithData(['token' => $token->token]);
        } else {
            return $this->respondWithError('Invalid Authentication');
        }
    }

    public function logout()
    {
        try {
            \AuthToken::where('token', Input::header('X-Auth-Token'))->delete();
        } catch (\Exception $e) {
            return $this->respondWithError($e->getMessage());
        }
        return $this->respondWithSuccess('Logout Successfully');
    }
}