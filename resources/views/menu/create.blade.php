<x-app-layout>

    <x-slot name="header">
        <div class="flex gap-2 justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data menu
           </h2> 

           <div class="flex gap-2">
            <a class="btn btn-primary" href="{{ route('user.index') }}">
                Data
            </a>
           </div>
        </div>
    </x-slot> 


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="card">
            <div class="card-body">
                <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="kategori" class="form-label">Kategori </label>
                      <select class="form-control select" name="kategori" id="kategori">
                        <option value=""></option>
                        @php
                          $kategoris = DB::table('kategoris')->select('id','nama')->get();
                        @endphp
                        @foreach ($kategoris as $kategori )
                        <option value="{{ $kategori->id }}"> {{ $kategori->nama }} </option>  
                        @endforeach
                        

                      </select>
                      @error('nama')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama </label>
                      <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" autocomplete="nama" >
                      @error('nama')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="harga" class="form-label">Harga </label>
                      <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga') }}" autocomplete="harga" >
                      @error('harga')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="gambar" class="form-label">gambar </label>
                      <input type="file" class="form-control " id="gambar" name="gambar" value="{{ old('gambar') }}" autocomplete="gambar"  accept="image/*">

                    </div>

                  

                     <button type="submit" class="btn btn-primary">Save</button>
                  </form>
            </div>
           </div>
        </div>
    </div>
</x-app-layout>
 


 