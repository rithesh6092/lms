<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! Admin::first()) {
            $admin = new Admin();
            $admin->name = 'lmsadmin';
            $admin->email = 'admin@gmail.com';
            $admin->image = 'uploads/website-images/admin.jpg';
            $admin->password = Hash::make('admin@1234');
            $admin->status = 'active';
            $admin->save();
            
            // Create a role if it doesn't exist
            $role = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'admin']);
            $admin?->assignRole($role);
        }
    }
}
