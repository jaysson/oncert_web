<?php

use Wicva\Services\User;

/**
 * Class AuthController
 */
class AuthController extends BaseController
{
    /**
     * @var User
     */
    private $user;


    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function login()
    {
        if (Auth::check()) {
            Notify::warning('You are already logged in!');
            return Redirect::to('/');
        }
        return View::make('auth.login');
    }

    /**
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function processLogin()
    {
        // Login credentials
        $credentials = array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
        );

        // Authenticate the user
        if (Auth::attempt($credentials, Input::has('remember_me'))) {
            if (Auth::user()->can('view_dashboard')) {
                return Redirect::to('/');
            } else {
                return Redirect::route('profile');
            }
        } else {
            Notify::error('Invalid login!');
        }
        return Redirect::back()->withInput();
    }


    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        Notify::info('You are now logged out!');
        return Redirect::to('/');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function forgotPassword()
    {
        return View::make('auth.forgot');
    }

    /**
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function processForgotPassword()
    {
        if($this->user->sendReminder(Input::get('email'))){
            return Redirect::route('login');
        } else {
            return Redirect::back()->withInput();
        }
    }

    /**
     * @return \Illuminate\View\View
     */
    public function resetPassword($token)
    {
        if (is_null($token)) App::abort(404);
        return View::make('auth.reset', array('token' => $token));
    }

    public function processResetPassword()
    {
        if($this->user->resetPazssword(Input::all())){
            return Redirect::route('login');
        } else {
            return Redirect::back()->withInput();
        }
    }
}