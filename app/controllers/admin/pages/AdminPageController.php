<?php

class AdminPageController extends AdminController
{
    public function index()
    {
        $pages = Page::all();

        $this->layout->content = View::make('admin.page.list')->with('pages', $pages);
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $this->layout->content = View::make('admin.page.edit')->with('page', $page);
    }

    public function update($id)
    {
        $page = Page::findOrFail($id);

        $page->title   = Input::input('title');
        $page->slug    = Input::input('slug');
        $page->content = Input::input('content');

        $page->save();

        return Redirect::to("/admin/page")->with('message', 'The page was edited successfully.')->with('message-type', 'alert-success');
    }

}