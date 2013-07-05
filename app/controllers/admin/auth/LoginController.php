<?php

class LoginController extends AdminController
{
    public $errors = [];

    /**
     * Shows the login form
     */
    public function getLogin()
    {
        $this->layout->with('navitems', []);
        $this->layout->content = View::make('admin.auth.login')->with('errors', $this->errors);
    }

    /**
     * Processes the login request
     */
    public function postLogin()
    {
        try
        {
            $credentials = array(
                'email'    => Input::get('email'),
                'password' => Input::get('password'),
            );

            Sentry::authenticate($credentials, true);

            return Redirect::intended('admin/dashboard');
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            $this->errors[] = Lang::get("auth.login_required");
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            $this->errors[] = Lang::get('auth.missing_password');
        }
        catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
        {
            $this->errors[] = Lang::get('auth.wrong_password');
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $this->errors[] = Lang::get('auth.account_not_found');
        }
        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
        {
            $this->errors[] = Lang::get('auth.account_not_activated');
        }
        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
        {
            $this->errors[] = Lang::get('auth.account_suspended');
        }
        catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
        {
            $this->errors[] = Lang::get('auth.account_banned');
        }

        $this->getIndex();
    }

    public function getIndex()
    {
        return Redirect::action("LoginController@getLogin");
    }
}