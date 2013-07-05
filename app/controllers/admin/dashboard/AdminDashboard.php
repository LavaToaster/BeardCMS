<?php

class AdminDashboardController extends AdminController
{

    public function getIndex()
    {
        $this->layout->content = View::make('admin.dashboard.dashboard');
    }
}