<?php

class PageController extends BaseController {

    /**
     * @var Page
     */
    protected $page;

    public function showPage($slug) {
        $this->page = Page::get(ltrim($slug, "/") ?: 'index.html');
        $this->page = Page::getPage(ltrim($slug, "/") ?: 'index.html');
        $this->layout->content = View::make('templates.pages.default')->with('page', $this->page->getAttributes());
    }

}