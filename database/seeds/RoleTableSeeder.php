<?php

use App\Model\Role;
use App\Model\RoleUser;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name' => 'admin'],
            ['name' => 'subscriber']
        ]);
    }
}
