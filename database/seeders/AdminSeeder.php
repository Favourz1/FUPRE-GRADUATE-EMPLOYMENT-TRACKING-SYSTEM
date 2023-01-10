<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::find(1);
        if ($admin) {
            echo ('Error! Database must be empty to seed! \n');
        } else {
            User::create([
                'name' => 'Admin',
                'email' => 'support@graduate-jobs.com',
                'email_verified_at' => now(),
                'password' => bcrypt('1234567890'),
            ]);
        }
    }
}
