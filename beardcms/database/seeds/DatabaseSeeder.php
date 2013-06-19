<?php

class DatabaseSeeder extends Seeder {

    public function run() {
        $this->call("DefaultPageSeeder");
        $this->command->info("Default page seeded.");
    }

}