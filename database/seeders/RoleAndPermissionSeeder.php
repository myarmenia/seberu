<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $perm = Permission::firstOrNew(['name' => 'see_categories']);
      $perm->save();
      $perm2 = Permission::firstOrNew(['name' => 'edit_category']);
      $perm2->save();
      $perm3 = Permission::firstOrNew(['name' => 'delete_category']);
      $perm3->save();
      $perm4 = Permission::firstOrNew(['name' => 'create_category']);
      $perm4->save();
      $perm5 = Permission::firstOrNew(['name' => 'see_users']);
      $perm5->save();
      $perm6 = Permission::firstOrNew(['name' => 'edit_user']);
      $perm6->save();
      $perm7 = Permission::firstOrNew(['name' => 'roles_and_perms']);
      $perm7->save();

      $admin = Role::firstOrNew(['name' => 'admin']);
      $admin->save();
      $moderator = Role::firstOrNew(['name' => 'moderator']);
      $moderator->save();
      Role::firstOrNew(['name' => 'root_admin'])->save();
      Role::firstOrNew(['name' => 'user'])->save();
      $admin->permissions()->attach($perm);
      $admin->permissions()->attach($perm2);
      $admin->permissions()->attach($perm3);
      $admin->permissions()->attach($perm4);
      $admin->permissions()->attach($perm5);
      $admin->permissions()->attach($perm6);
      $admin->permissions()->attach($perm7);

      $moderator->permissions()->attach($perm);
      $moderator->permissions()->attach($perm2);
      $moderator->permissions()->attach($perm3);
      $moderator->permissions()->attach($perm4);
      $moderator->permissions()->attach($perm5);
    }
}
