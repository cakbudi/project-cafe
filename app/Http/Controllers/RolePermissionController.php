<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    //
    public function index(){      
        return view('role-permission.index');
    }
    public function edit($id){ 
        $role = Role::findOrFail($id);
        return view('role-permission.edit',['role'=> $role]);
    }

    public function store(Request $request){
        $role = Role::findOrFail($request->id);
        if($request->permission){
            DB::table('role_has_permissions')->where('role_id',$role->id)->delete();
            $role->givePermissionTo($request->permission);
        
        }else{
            DB::table('role_has_permissions')->where('role_id',$role->id)->delete();
        }
        
        return to_route('role-permission.index');
    } 
    
    public function role_delete($id){
        DB::table('roles')->where('id',$id)->delete();
        return to_route('role-permission.index');
     }
    

    public function storerole(Request $request){
        $request->validate([
            'nama' =>'required',
        ],[
            'required' => "Tidak boleh kosong ",
        ]);

        $save = Role::create([
            'name'=>$request->nama,
        ]);

        return redirect(route('role-permission.index')); 
    }

    public function storepermission(Request $request){
        $request->validate([
            'nama' =>'required',
        ],[
            'required' => "Tidak boleh kosong ",
        ]);

        $save = Permission::create([
            'name'=>$request->nama,
        ]);

        return redirect(route('role-permission.index'));     }

    
}
