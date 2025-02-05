<x-app-layout>

    <x-slot name="header">
        <div class="flex gap-2 justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data User
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
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama </label>
                      <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" autocomplete="nama" >
                      @error('nama')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" autocomplete="email" >
                      @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="mb-3">
                      <label for="role" class="form-label">Role</label>
                      <select class="form-control select" id="role" name="role" >
                        <option value=""></option>
                        @php
                        $roles = DB::table('roles')->get();
                        @endphp
                        @foreach ( $roles as $role)
                        <option value="{{ $role->name }}" >{{ ucwords($role->name) }}</option>
                        @endforeach
                        
                      </select>
                      
                      @error('role')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                     <button type="submit" class="btn btn-primary">Save</button>
                  </form>
            </div>
           </div>
        </div>
    </div>
</x-app-layout>
 


 