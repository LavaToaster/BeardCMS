<?php
/**
 * @author bstrahija
 * @link http://forums.laravel.io/viewtopic.php?id=6210
 */

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class Refresh extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'beardcms:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refreshes the database including packages.';

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
        if ($this->confirm('Are you sure you want to refresh your installation? You will loose all data stored in the database! [yes|no]'))
        {
            // First reset data
            echo 'Reseting DB...'.PHP_EOL;
            $this->call('migrate:reset');
            echo 'Done.'.PHP_EOL.PHP_EOL;

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