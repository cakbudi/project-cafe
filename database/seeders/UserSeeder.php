<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $id_text = date("ymd").mt_rand().date("his");
        $adminUser = User::create([
            'id_text'=>$id_text,
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('superadmin')
        ]);

        $roles = ['super admin','manager','kasir','chef','purchasing'];
        foreach($roles as $role){
            Role::create(['name' => $role]);
        }

        

        $adminUser->assignRole('super admin');
    }
}
