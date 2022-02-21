<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Role;

use Illuminate\Database\Seeder;

class ModeratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $rootAdmin = Role::where('name','root_admin')->first();

      $moderator = Role::where('name','moderator')->first();

      $user = User::create([
        'name' => 'moderator',
        'surname' => 'moderator',
        'patronymic' => 'moderator',
        'email' => 'moderator@example.com',
        'password' => 'moderator1234',
        'email_verified_at' => date("Y-m-d h:i:sa")
      ]);

      $user->roles()->attach($rootAdmin['id']);
      $user->roles()->attach($moderator['id']);

      $user2 = User::create([
        'name' => 'moderator2',
        'surname' => 'moderator2',
        'patronymic' => 'moderator2',
        'email' => 'moderator2@example.com',
        'password' => 'moderator1234',
        'email_verified_at' => date("Y-m-d h:i:sa")
      ]);

      $user2->roles()->attach($rootAdmin['id']);
      $user2->roles()->attach($moderator['id']);
    }
}
