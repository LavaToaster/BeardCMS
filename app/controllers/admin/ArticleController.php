<?php namespace Admin;

use Input;
use Article;
use Redirect;
use Response;
use URL;
use Validator;
use View;


class ArticleController extends AdminController {

    protected $templates = [
        'default' => 'Default'
    ];

    protected $visibility = [
        'public'  => 'Public',
        'private' => 'Private',
    ];

    /**
     * Display article list.
     *
     * @return Response
     */
    public function index()
    {
        $this->layout->content = View::make('admin.article.index')->with('articles', Article::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->layout->content = View::make('admin.article.create')->with('templates', $this->templates);
    }

    protected function validate()
    {
        return Validator::make(Input::input(), [
            'title'                 => 'required',
            'slug'                  => 'required|unique:pages,slug|unique:articles,slug',
            'article_content'          => 'required',
            'template'              => 'required|in:' . implode(',', array_keys($this->templates)),
            'visibility'            => 'required|in:' . implode(',', array_keys($this->visibility))
        ], [
            'title.required'        => 'You must enter an article title.',
            'slug.required'         => 'You must enter an article slug.',
            'slug.unique'           => 'This slug is already in use.',
            'article_content.required' => 'You must enter the article contents.'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = $this->validate(true);

        if ($validator->fails()) {
            Input::flashExcept('_token', 'submit');
            return Redirect::to('admin/article/create')->with('errors', $validator->messages()->toArray());
        }

        $article = new Article;

        $article->title      = Input::input('title');
        $article->slug       = Input::input('slug');
        $article->visibility = Input::input('visibility');
        $article->template   = Input::input('template');
        $article->content    = Input::input('article_content');

        $article->save();

        return Redirect::to('/admin/article')->with('message', 'The article was added successfully. You can view it <a href="'.URL::to($article->slug).'">here</a>')->with('message-type', 'alert-success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        $this->layout->content = View::make('admin.article.edit')->with('article', $article)->with('templates', $this->templates)->with('visibility', $this->visibility);
    }

    public function update($id)
    {
        $article = Article::findOrFail($id);

        $validator = $this->validate($article->slug !== Input::input('slug'));

        if ($validator->fails()) {
            Input::flashExcept('_token', 'submit');
            return Redirect::to('admin/article/'.$id.'/edit')->with('errors', $validator->messages()->toArray());
        }

        $article->title      = Input::input('title');
        $article->slug       = Input::input('slug');
        $article->visibility = Input::input('visibility');
        $article->content    = Input::input('article_content');

        $article->save();

        return Redirect::to('/admin/article')->with('message', 'The article was edited successfully.')->with('message-type', 'alert-success');
    }

    public function destroy($id)
    {
        return Article::find($id)->delete() ? Response::json(['success' => true, 'message' => 'The article was deleted successfully.']) : Response::json(['success' => false, 'message' => 'There was an error attempting to delete the article']);
    }

}