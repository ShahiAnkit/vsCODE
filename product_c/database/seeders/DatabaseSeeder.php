<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pankaj',
            'company_name' => 'Pankaj',
            'email' => 'pankaj.pcellp@gmail.com',
            'password' => bcrypt('Admin@123'),
          //  'api_token' => hash('sha256', env('DEMO_USER_API_KEY'))
        ]);
    }
}
