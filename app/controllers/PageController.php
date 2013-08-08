<?php

class PageController extends BaseController {

    /**
     * @var Page
     */
    protected $page;

    /**
     * Find and set the layout's content
     *
     * @param $slug string The slug to the page
     * @return void
     */
    public function showPage($slug) {
        $this->page = Page::getPage(ltrim($slug, "/") ?: 'index.html');
        $this->layout->content = View::make('templates.pages.default')->with('page', $this->page->getAttributes());
    }

}