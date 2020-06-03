<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // On ajoute les roles avant les utilisateurs
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
