<?php

class DefaultNavigationSeeder extends Seeder
{
    public function run()
    {
        /* Default Admin */

        //Dashboard
        Navigation::insert([
            'name'  => 'Dashboard',
            'title' => 'Go to the dashboard',
            'url'   => 'admin/dashboard',
            'type'  => 2
        ]);

        //Pages
        Navigation::insert([
            'name'  => 'Pages',
            'title' => 'Go to the page lsit',
            'url'   => 'admin/page',
            'type'  => 2
        ]);


        /* Default Public */

        //Home
        Navigation::insert([
            'name'  => 'Home',
            'title' => 'Go to the homepage',
            'url'   => Config::get('app.url'),
            'type'  => 1
        ]);
    }
}