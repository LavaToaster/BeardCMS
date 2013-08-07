<?php

class AdminPageController extends AdminController
{
    public function index()
    {
        $pages = Page::all();

        $this->layout->content = View::make('admin.page.list')->with('pages', $pages);
    }
}