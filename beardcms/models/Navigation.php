<?php

class Navigation extends Eloquent {

    protected $table = 'navigation';

    public function isActive()
    {
        return $this->url == Url::current() ? true : false;
    }
}