<?php

use App\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // name, email, password
        $user = User::create([
            'name' => 'Jérôme',
            'email' => 'test@test.com',
            'password' => Hash::make('000000')
        ]);

        // On ajoute le role
        $user->roles()->sync([2]);

    }
}
