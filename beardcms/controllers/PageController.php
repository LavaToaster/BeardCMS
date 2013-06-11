<?php

class PageController extends BaseController {

    /**
     * @var Page
     */
    protected $page;

    public function pageExists() {
        $this->page = Page::where('uri', '=',Request::path())->first();
        return $this->page ? true : false;
    }

    public function showPage($slug) {
        if($this->pageExists()) {
            $this->layout->content = View::make("templates.pages.default")->with('page', $this->page->getAttributes());
        }
    }

}