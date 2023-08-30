<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name'=>'My Blogger Real',
                'email'=> 'blogger@gmail.com',
                'password'=>Hash::make('67890')
            ]
            );
    }
}
