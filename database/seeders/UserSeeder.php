<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Admin Api Photo',
            'email' => 'admin@gmail.com',
            'password' => 'adminpassword'
        ];

        User::create($data);
    }
}
