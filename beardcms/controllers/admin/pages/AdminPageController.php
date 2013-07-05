<?php

class AdminPageController extends AdminController
{
    public function getIndex()
    {
        $pages = Page::all();

        $this->layout->content = View::make('admin.page.pagelist')->with('pages', $pages);
    }
}