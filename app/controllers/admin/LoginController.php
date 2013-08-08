<?php namespace Admin;

use Input;
use Lang;
use View;
use Redirect;
use Sentry;
use Cartalyst\Sentry\Throttling\UserBannedException;
use Cartalyst\Sentry\Throttling\UserSuspendedException;
use Cartalyst\Sentry\Users\LoginRequiredException;
use Cartalyst\Sentry\Users\PasswordRequiredException;
use Cartalyst\Sentry\Users\UserNotActivatedException;
use Cartalyst\Sentry\Users\UserNotFoundException;
use Cartalyst\Sentry\Users\WrongPasswordException;

class LoginController extends AdminController
{
    public $errors = [];

    /**
     * Shows the login form
     */
    public function getIndex()
    {
        if (Sentry::check()) {
            return Redirect::to('admin/dashboard');
        }

        $this->layout->with('navitems', []);
        $this->layout->content = View::make('admin.auth.login')->with('errors', $this->errors);
    }

    /**
     * Processes the login request
     */
    public function postIndex()
    {
        try
        {
            $credentials = array(
                'email'    => Input::input('email'),
                'password' => Input::input('password'),
            );

            Sentry::authenticate($credentials, true);

            return Redirect::intended('admin/dashboard');
        }
        catch (LoginRequiredException $e)
        {
            $this->errors[] = Lang::get("auth.login_required");
        }
        catch (PasswordRequiredException $e)
        {
            $this->errors[] = Lang::get('auth.missing_password');
        }
        catch (WrongPasswordException $e)
        {
            $this->errors[] = Lang::get('auth.wrong_password');
        }
        catch (UserNotFoundException $e)
        {
            $this->errors[] = Lang::get('auth.account_not_found');
        }
        catch (UserNotActivatedException $e)
        {
            $this->errors[] = Lang::get('auth.account_not_activated');
        }
        catch (UserSuspendedException $e)
        {
            $this->errors[] = Lang::get('auth.account_suspended');
        }
        catch (UserBannedException $e)
        {
            $this->errors[] = Lang::get('auth.account_banned');
        }

        return $this->getIndex();
    }

    public function getLogout()
    {
        Sentry::logout();
        return Redirect::action('Admin\LoginController@getIndex');
    }

}