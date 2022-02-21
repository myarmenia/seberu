<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rootAdmin = Role::where('name','root_admin')->first();

        $admin = Role::where('name','admin')->first();

        $user = User::create([
          'name' => 'admin',
          'surname' => 'admin',
          'patronymic' => 'admin',
          'email' => 'admin@example.com',
          'password' => 'admin1234',
          'email_verified_at' => date("Y-m-d h:i:sa")
        ]);

        $user->roles()->attach($rootAdmin['id']);
        $user->roles()->attach($admin['id']);

        $user2 = User::create([
          'name' => 'admin2',
          'surname' => 'admin2',
          'patronymic' => 'admin2',
          'email' => 'admin2@example.com',
          'password' => 'admin1234',
          'email_verified_at' => date("Y-m-d h:i:sa")
        ]);

        $user2->roles()->attach($rootAdmin['id']);
        $user2->roles()->attach($admin['id']);

    }
}
