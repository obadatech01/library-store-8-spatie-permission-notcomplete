<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // User Permission
            'users',
            'users-profiles',
            'users-create',
            'users-edit',
            'users-soft-delete',
            'users-force-delete',

            // Role Permission
            'roles',
            'roles-show',
            'roles-create',
            'roles-edit',
            'roles-delete',

            // Category Permission
            'categories',
            'categories-create',
            'categories-edit',
            'categories-show',
            'categories-soft-delete',
            'categories-force-delete',

            // Book Permission
            'books',
            'books-import-excel',
            'books-export-excel',
            'books-export-pdf',
            'books-active',
            'books-inactive',
            'books-create',
            'books-edit',
            'books-show',
            'books-soft-delete',
            'books-force-delete',

            // Instruction Permission
            'instructions',
            'instructions-create',
            'instructions-edit',
            'instructions-delete',

            // Archive Permission
            'archives',
            'archives-users',
            'archives-users-restore',
            'archives-categories',
            'archives-categories-restore',
            'archives-books',
            'archives-books-restore',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
