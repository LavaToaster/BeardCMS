<?php

class DefaultNavigationSeeder extends Seeder
{
    public function run()
    {
        $nav = new Navigation();
        $nav->name  = "Home";
        $nav->title = "Go to the homepage";
        $nav->url   = Config::get('app.url');
        $nav->save();
    }
}