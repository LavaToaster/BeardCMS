<?php

class AdminController extends BaseController {

    /**
     * @var Illuminate\View\View
     */
    protected $layout = "layouts.admin.master";

    public function __construct() {
        //TODO Validate user's auth
    }

}