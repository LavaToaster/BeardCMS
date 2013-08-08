<?php

class AdminDashboardController extends AdminController
{

    public function getIndex()
    {
        return Redirect::action('AdminDashboardController@getDashboard');
    }

    public function getDashboard()
    {
        $this->layout->content = View::make('admin.dashboard.dashboard');
    }
}