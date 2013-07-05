<?php

class DatabaseSeeder extends Seeder {

    public function run() {
        $this->call("DefaultPageSeeder");
        $this->command->info("Seeded default page.");

        $this->call('DefaultGroupSeeder');
        $this->command->info('Seeded default group.');

        $this->call('DefaultUserSeeder');
        $this->command->info('Seeded default user. admin@example.com:test');
    }

}