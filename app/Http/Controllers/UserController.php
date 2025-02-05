<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        //
        return view('user.index',['users' => User::whereNot('id','1')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama'=> 'required',
            'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',

        ],[
            'required' => "Tidak boleh kosong ",
            'unique' => "Sudah terdaftar"
        ]);


        $id_text = date("ymd").mt_rand().date("his");

        $save = User::create([
            'name'=>$request->nama,
            'id_text'=>$id_text,
            'email'=>$request->email,
            'password'=>  Hash::make('guest'),
        ]);

        $request->role?$save->assignRole($request->role):null;

        return  $save ?  redirect(route('user.index'))->with(['success'=>'Data saved']) : redirect(route('user.create')); 

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $user = User::where('id_text',$id)->firstOrFail();
        return view('user.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $user = User::where('id_text',$id)->firstOrFail();
        return view('user.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'nama'=> 'required',
            'email' => 'required|email|unique:users,email,'.$user->id.',id,deleted_at,NULL',

        ],[
            'required' => "Tidak boleh kosong ",
            'unique' => "Sudah terdaftar"
        ]);

        $save = $user->update([
            'name'=>$request->nama,
            'email'=>$request->email,
        ]);
        if($request->role){
            
            $cek = DB::table('model_has_roles')->where('model_id',$user->id)->get();
            if(COUNT($cek) < 1){
                $user->assignRole($request->role);
            }else{
                $role = DB::table('roles')->where('name',$request->role)->first();
                DB::table('model_has_roles')
                ->where('model_id',$user->id)
                ->update(['role_id'=>$role->id]);
            }
            

        }else{
            DB::table('model_has_roles')
            ->where('model_id',$user->id)
            ->delete();
        
        }
 
        return  $save ?  redirect(route('user.index'))->with(['success'=>'Data saved']) : redirect(route('user.edit',$user->id)); 
        
    }

    /**
     * Remove the specified resource from storage.
     */
    
    
     public function delete(Request $request)
     {
         //
         $user = User::findOrFail($request->id);
         $user->delete();
         return redirect(route('user.index'))->with(['delete'=>'Data deleted']); 
     }
     
     public function destroy(User $user)
    {
        //
    }
}
