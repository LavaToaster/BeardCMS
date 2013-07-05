<?php

class DefaultUserSeeder extends Seeder {
    public function run() {
        try
        {
            // Create the user
            $user = Sentry::getUserProvider()->create(array(
                'email'     => 'admin@example.com',
                'password'  => 'test',
                'activated' => '1'
            ));

            // Find the group using the group id
            $adminGroup = Sentry::getGroupProvider()->findByName('Admin');

            // Assign the group to the user
            $user->addGroup($adminGroup);
        }
        catch (Cartalyst\Sentry\Users\UserExistsException $e)
        {
            //User already seeded... Ignore and continue
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            //Group doesn't exist, well uhh...
        }
    }
}