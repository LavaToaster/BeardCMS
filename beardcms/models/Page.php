<?php

class Page extends Eloquent {

    protected $guarded = ['id'];

    /**
     * Checks if the page exists
     *
     * @see Page::get();
     * @param string|int $identifier
     * @return bool
     */
    public static function pageExists($identifier)
    {
        try {
            static::get($identifier);
        } catch ( \Illuminate\Database\Eloquent\ModelNotFoundException $e ) {
            return false;
        }

        return true;
    }

    /**
     * Attempts to find and return the page
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     *
     * @param string|int $identifier Page ID (int) or Page URI (string)
     * @return Page
     */
    public static function getPage($identifier)
    {
        if(is_int($identifier)) {
            $page = static::find($identifier)->firstOrFail();
        } else {
            $page = static::where('slug', '=', $identifier)->firstOrFail();
        }

        return $page;
    }

}