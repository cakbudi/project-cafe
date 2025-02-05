<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create( 
            ['name' => 'super admin'],
            ['name' => 'manager'],       
            ['name' => 'kasir'],
            ['name' => 'chef'],       
            ['name' => 'purchasing'], 

        );
     User::find(1)->assignRole ('super admin');

    //  $permissions =['create user','edit user','delete user'];
     
    //  foreach($permissions as $permission ){
    //         Permission::create(['name' => $permission]);
    //  }
    


    }
}
