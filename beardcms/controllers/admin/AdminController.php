<?php

class AdminController extends BaseController {

    /**
     * @note Temp until the admin template is ready
     * @var Illuminate\View\View
     */
    protected $layout = "layouts.master";

    public function __construct() {
        //TODO Validate user's auth
    }

}