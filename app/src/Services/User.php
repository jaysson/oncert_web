<?php

namespace Wicva\Services;

use Mail;
use Password;
use View;
use Lang;
use Notify;
use User as UserModel;

/**
 * Class User
 * @package Wicva\Services
 */
class User
{
    /**
     * @var user
     */
    protected $user;
    /**
     * @var ResetPassword
     */
    private $resetPassword;

    public function __construct(UserValidation $user, ResetPassword $resetPassword)
    {
        $this->user = $user;
        $this->resetPassword = $resetPassword;
    }

    /**
     * @param $data
     * @param array $roleIds
     * @return \User
     * @throws FormValidationException
     */
    public function create($data, $roleIds = [], $segmentIds = [])
    {
        $this->user->validate($data);
        // Let's register a user and activate him.
        $user = UserModel::create($data);
        Mail::send('emails.new_user', array('user' => $data), function ($message) use ($data) {
            $message->to($data['email'], $data['name'])->subject('Profile Created successfully');
        });

        $user->roles()->sync($roleIds);
        $user->segments()->sync($segmentIds);
        return $user;
    }

    /**
     * @param UserModel $user
     * @param array $userData
     * @param array $roleIds
     * @return \Wicva\Services\User
     * @throws FormValidationException
     */
    public function update(UserModel $user, $userData = [], $roleIds = [], $segmentIds = [])
    {
        $rules = array_merge($this->user->getValidationRules(), [
            'email' => 'required|unique:users,email,' . $user->id,
            'password' => 'min:6|max:32'
        ]);
        $this->user->setValidationRules($rules);
        $this->user->validate($userData);
        $user->update($userData);
        $user->roles()->sync($roleIds);
        $user->segments()->sync($segmentIds);
        return $user;
    }

    public function sendReminder($email, $type = 'link')
    {
        View::composer('emails.auth.reminder', function ($view) use ($type) {
            $view->with(['type' => $type]);;
        });
//        dd($email);
        switch ($response = Password::remind(['email' => $email], function ($message) {
            $message->subject('Password Reminder');
        })) {
            case Password::INVALID_USER:
                \Mail::send('emails.auth.invalid_user', array(), function ($message) use ($email) {
                    $message->to($email)->subject('Invalid Email ID');
                });
                Notify::error(Lang::get($response));
                return false;

            case Password::REMINDER_SENT:
                Notify::info(Lang::get($response));
                return true;
        }
    }

    /**
     * @param array $credentials
     * @return mixed
     * @throws FormValidationException
     */
    public function resetPassword(array $credentials)
    {
        try {
            $this->resetPassword->validate($credentials);

            $response = Password::reset($credentials, function ($user, $password) {
                $user->password = $password;
                $user->save();
            });

            switch ($response) {
                case Password::INVALID_PASSWORD:
                case Password::INVALID_TOKEN:
                case Password::INVALID_USER:
                    Notify::error(Lang::get($response));
                    return false;

                case Password::PASSWORD_RESET:
                    Notify::info('Password reset successfully');
                    return true;
            }
        } catch (FormValidationException $exception) {
            return false;
        }
    }
}