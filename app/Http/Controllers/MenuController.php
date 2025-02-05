<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('menu.index',['menu'=>Menu::get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('menu.create');
    }

/**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' =>'required',
            'harga' =>'required',
            'kategori' =>'required',
        ],[
            'required' => "Tidak boleh kosong ",
        ]);

        $file = $request->file('gambar');
        
        if($request->file('gambar')){
            $nama_file = time().'.'.$file->getClientOriginalExtension();
		    $file->move('storage/images/menu/',$nama_file);
            $gambar=$nama_file;
        }else{
            $gambar='';
        }

        $save = Menu::create([
            'kategori_id'=>$request->kategori,
            'nama'=>$request->nama,
            'harga'=>$request->harga,
            'gambar'=>$gambar,
        ]);

        return  $save ?  redirect(route('menu.index'))->with(['success'=>'Data saved']) : redirect(route('menu.create')); 

		
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
        return view('menu.edit',['menu'=>$menu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
        $request->validate([
            'nama' =>'required',
            'harga' =>'required',
            'kategori' =>'required',
        ],[
            'required' => "Tidak boleh kosong ",
        ]);

        $file = $request->file('gambar');
        
        if($request->file('gambar')){
            $nama_file = time().'.'.$file->getClientOriginalExtension();
		    $file->move('storage/images/menu/',$nama_file);
            $gambar=$nama_file;
        }else{
            $gambar=$menu->gambar;
        }

        $save = $menu->update([
            'kategori_id'=>$request->kategori,
            'nama'=>$request->nama,
            'harga'=>$request->harga,
            'gambar'=>$gambar,
        ]);

        return  $save ?  redirect(route('menu.index'))->with(['success'=>'Data saved']) : redirect(route('menu.edit',$menu->id)); 

    }

    public function delete(Request $request)
    {
        //
        $data = Menu::findOrFail($request->id);
        $data->delete();
        return redirect(route('menu.index'))->with(['delete'=>'Data deleted']); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
