<?php

class IndexController extends BaseController {

    public function getIndex() {
        $this->layout->content = View::make('index');
    }

}