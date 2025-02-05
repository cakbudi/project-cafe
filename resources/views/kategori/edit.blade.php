<x-app-layout>

    <x-slot name="header">
        <div class="flex gap-2 justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data kategori
           </h2> 

           <div class="flex gap-2">
            <a class="btn btn-primary" href="{{ route('kategori.index') }}">
                Data
            </a>
           </div>
        </div>
    </x-slot> 

        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="card">
            <div class="card-body">
                <form action="{{ route('kategori.update',$kategori->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama </label>
                      <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama',$kategori->name) }}" autocomplete="nama" >
                      @error('nama')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
 

                     <button type="submit" class="btn btn-primary">Save</button>
                  </form>
            </div>
           </div>
        </div>
    </div>
</x-app-layout>
 


 