<?php namespace Admin;

use BaseController;
use Navigation;

abstract class AdminController extends BaseController {

    /**
     * @note Temp until the admin template is ready
     * @var \Illuminate\View\View
     */
    protected $layout = "layouts.master";

    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    protected function setupNavigation()
    {
        $this->layout->with('navitems', Navigation::where('type', '=', 2)->get());
    }

}