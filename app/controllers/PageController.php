<?php

class PageController extends BaseController {

    /**
     * Find and set the layout's content
     *
     * @param $slug string The slug to the page
     * @return void
     */
    public function showPage($slug) {
        $page = Page::getPage(ltrim($slug, "/") ?: 'index.html');
        $this->layout->content = View::make('templates.pages.')->with('page', $page->getAttributes());
    }

}