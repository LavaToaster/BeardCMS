<?php

class DefaultGroupSeeder extends Seeder {
    public function run() {
        try
        {
            // Create the group
            Sentry::getGroupProvider()->create(array(
                'name'        => 'Admin',
            ));
        }
        catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
        {
            //Group already exists so we don't have to seed it
        }
    }
}