<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::updateOrCreate(
            [
                'name' => 'admin',
            ],
            ['name' => 'admin']
        );

        $role_pelatih = Role::updateOrCreate(
            [
                'name' => 'pelatih',
            ],
            ['name' => 'pelatih']
        );

        $role_siswa = Role::updateOrCreate(
            [
                'name' => 'siswa',
            ],
            ['name' => 'siswa']
        );

        $permission = Permission::updateOrCreate(
            [
                'name' => 'view_dashboard',
            ],
            ['name' => 'view_dashboard']
        );

        $permission2 = Permission::updateOrCreate(
            [
                'name' => 'view_chart_on_dashboad',
            ],
            ['name' => 'view_chart_on_dashboad']
        );

        $role_admin->givePermissionTo($permission);
        $role_admin->givePermissionTo($permission2);
        $role_pelatih->givePermissionTo($permission2);

        $user = User::find(1);

        $user->assignRole(['admin', 'pelatih']);

    }
}
