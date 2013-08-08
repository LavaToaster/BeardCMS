<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AddUser extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'beardcms:adduser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs BeardCMS.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $firstName = $this->option('firstname') ?: $this->ask('First name?');
        $lastName  = $this->option('lastname')  ?: $this->ask('Last name?');
        $email     = $this->option('email')     ?: $this->ask('Email?');
        $password  = $this->option('password')  ?: $this->getPassword(); //Not entirely sure if this should be allowed

        $this->line('Creating user...');
        try
        {
            // Create the user
            $user = Sentry::getUserProvider()->create(array(
                'first_name' => $firstName,
                'last_name'  => $lastName,
                'email'      => $email,
                'password'   => $password,
                'activated'  => '1',
            ));

            // Find the group using the group id
            $adminGroup = Sentry::getGroupProvider()->findByName('Admin');

            // Assign the group to the user
            $user->addGroup($adminGroup);

            $this->line('User created successfully');
        }
        catch (Cartalyst\Sentry\Users\UserExistsException $e)
        {
            $this->line('A user with the given details already exists');
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            $this->line('Admin group not found, did you seed the database?');
        }
    }

    public function getPassword()
    {
        $password = $this->secret('Password?');
        $passwordConfirmation = $this->secret('Confirm Password?');

        if($password !== $passwordConfirmation) {
            $this->line('The passwords did not match, try again.');
            $this->line('');
            return $this->getPassword();
        }

        return $password;
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['firstname', null, InputOption::VALUE_OPTIONAL, 'The first name of the user'],
            ['lastname', null, InputOption::VALUE_OPTIONAL, 'The last name of the user'],
            ['email', null, InputOption::VALUE_OPTIONAL, 'The email for the user'],
            ['password', null, InputOption::VALUE_OPTIONAL, 'The password to give the user']
        ];
    }

}