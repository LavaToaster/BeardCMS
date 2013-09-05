<?php

class PageController extends BaseController {

    /**
     * Find and set the layout's content
     *
     * @param $slug string The slug to the page
     * @return void
     */
    public function showPage($slug) {
        //First lets see if an article exists, then we'll check the pages
        if($article = Article::where('slug', '=', $slug)->first()) {
            $this->layout->content = View::make('templates.article.'.$article->template)->with('article', $article->getAttributes());
            return;
        }

        $page = Page::getPage(ltrim($slug, "/") ?: 'index.html', 'public');
        $this->layout->content = View::make('templates.'.$page->type.'.'.$page->template)->with('page', $page->getAttributes());
    }

}