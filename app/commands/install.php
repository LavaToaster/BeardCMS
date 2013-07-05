<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class Refresh extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'beardcms:install';

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
        // Migrate sentry
        $this->line('Migrating Sentry');
        $this->call('migrate', array('--package' => 'cartalyst/sentry'));

        // Migrate our migrations
        $this->line('Migrating BeardCMS');
        $this->call('migrate');

        // And seed it
        $this->line("Seeding DB");
        $this->call('db:seed');
        $this->line('Done.');
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
        return [];
    }

}