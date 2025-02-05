<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('kategori.index',['kategori'=>Kategori::get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' =>'required'
        ],[
            'required' => "Tidak boleh kosong ",
        ]);
        $save = Kategori::create([
            'nama'=>$request->nama,
        ]);

        return  $save ?  redirect(route('kategori.index'))->with(['success'=>'Data saved']) : redirect(route('kategori.create')); 

    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
        return view('kategori.show',['kategori'=>$kategori]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
        return view('kategori.edit',['kategori'=>$kategori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        //

        $request->validate([
            'nama' =>'required'
        ],[
            'required' => "Tidak boleh kosong ",
        ]);
        $save = $kategori->update([
            'nama'=>$request->nama,
        ]);

        return  $save ? redirect(route('kategori.index'))->with(['success'=>'Data saved']) : redirect(route('kategori.create')); 


    }

    public function delete(Request $request)
    {
        //
        $kategori = Kategori::findOrFail($request->id);
        $kategori->delete();
        return redirect(route('kategori.index'))->with(['delete'=>'Data deleted']); 
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
