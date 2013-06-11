<?php

class Page extends Eloquent {

    public $title;

    public $content;

    public $uri;

    protected $guarded = ['id'];

}