<?php

class AdminController extends BaseController {

    /**
     * @note Temp until the admin template is ready
     * @var Illuminate\View\View
     */
    protected $layout = "layouts.master";

    protected function setupNavigation()
    {
        $this->layout->with('navitems', Navigation::where('type', '=', 2)->get());
    }

}