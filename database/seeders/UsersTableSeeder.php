<?php

// database/seeders/UsersTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create(); // Create 10 dummy users
    }
}

