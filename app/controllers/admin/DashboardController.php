<?php namespace Admin;

use Redirect;
use View;

class DashboardController extends AdminController
{

    public function getIndex()
    {
        return Redirect::action('Admin\DashboardController@getDashboard');
    }

    public function getDashboard()
    {
        $this->layout->content = View::make('admin.dashboard.dashboard');
    }
}