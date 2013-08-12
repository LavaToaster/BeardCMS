<?php namespace Admin;

use Input;
use Page;
use Redirect;
use Response;
use URL;
use Validator;
use View;

class PageController extends AdminController
{
    protected $templates = [
        'none' => 'None'
    ];

    protected $visibility = [
        'public'  => 'Public',
        'private' => 'Private',
    ];

    public function index()
    {
        $this->layout->content = View::make('admin.page.index')->with('pages', Page::all());
    }

    public function create()
    {
        $this->layout->content = View::make('admin.page.create')->with('templates', $this->templates)->with('visibility', $this->visibility);
    }

    protected function validate($uniqueSlug = false)
    {
        return Validator::make(Input::input(), [
            'title'                 => 'required',
            'slug'                  => 'required' . ( $uniqueSlug ? '|unique:pages,slug' : '' ),
            'page_content'          => 'required',
            'template'              => 'required|in:' . implode(',', array_keys($this->templates)),
            'visibility'            => 'required|in:' . implode(',', array_keys($this->visibility))
        ], [
            'title.required'        => 'You must enter a page title.',
            'slug.required'         => 'You must enter a page slug.',
            'slug.unique'           => 'This slug is already in use.',
            'page_content.required' => 'You must enter some page content.'
        ]);
    }

    public function store()
    {
        $validator = $this->validate(true);

        if ($validator->fails()) {
            Input::flashExcept('_token', 'submit');
            return Redirect::to('admin/page/create')->with('errors', $validator->messages()->toArray());
        }

        $page = new Page;

        $page->title      = Input::input('title');
        $page->slug       = Input::input('slug');
        $page->type       = 'page';
        $page->visibility = Input::input('visibility');
        $page->template   = Input::input('template');
        $page->content    = Input::input('page_content');

        $page->save();

        return Redirect::to('/admin/page')->with('message', 'The page was added successfully. You can view it <a href="'.URL::to($page->slug).'">here</a>')->with('message-type', 'alert-success');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);

        $this->layout->content = View::make('admin.page.edit')->with('page', $page)->with('templates', $this->templates)->with('visibility', $this->visibility);
    }

    public function update($id)
    {
        $page = Page::findOrFail($id);

        $validator = $this->validate($page->slug !== Input::input('slug'));

        if ($validator->fails()) {
            Input::flashExcept('_token', 'submit');
            return Redirect::to('admin/page/'.$id.'/edit')->with('errors', $validator->messages()->toArray());
        }

        $page->title      = Input::input('title');
        $page->slug       = Input::input('slug');
        $page->visibility = Input::input('visibility');
        $page->content    = Input::input('page_content');

        $page->save();

        return Redirect::to('/admin/page')->with('message', 'The page was edited successfully.')->with('message-type', 'alert-success');
    }

    public function destroy($id)
    {
        return Page::find($id)->delete() ? Response::json(['success' => true, 'message' => 'The page was deleted successfully.']) : Response::json(['success' => false, 'message' => 'There was an error attempting to delete the page']);
    }
}