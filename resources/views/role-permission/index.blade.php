<x-app-layout>

    <x-slot name="header">
        <div class="flex gap-2 justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Role & Permission
           </h2> 

           <div class="flex gap-2">
            {{-- <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                Create Role
            </a> --}}

            {{-- <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPermissionModal">
                Create Permission
            </a> --}}
           </div>
        </div>
        
    </x-slot> 

     
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card mb-4">
                 <div class="card-body">
           <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Role</th>
                    <th width="50px">Permission</th>
                </tr>
            </thead>
            <tbody>
                @php
                $roles = DB::table('roles')->get();
                @endphp
                @foreach ( $roles as  $role)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $role->name }}</td>
                    <td class="text-center"> 
                        <a href="{{ route('role-permission.edit',$role->id) }}" title="Edit"><i class="fa-solid fa-pencil text-warning cursor-pointer"></i></a>
                        
                        {{-- @if($role->name !== 'super admin')
                        <i class="fa-solid fa-trash text-danger cursor-pointer" data-id="{{ $role->id }}" data-href="{{ route('role-permission.role.delete',$role->id) }}" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>    
                        @endif --}}
                        
                        
                    </td>
                </tr>
                @endforeach
         
            </tbody>
            </table>  
                
        </div>
        </div>
       

        </div>

        
    </div>


    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{ route('role-permission.role.store') }}" method="post">
                @csrf
            <div class="modal-body">
                
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama </label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" autocomplete="nama" autofocus >
                    @error('nama')<span class="text-danger">{{ $message }}</span>@enderror
                  </div>
                  
                </div>      
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
        </form> 
          </div>
        </div>
      </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
           
            <form action="{{ route('user.delete') }}" method="post">
                @csrf
            <div class="modal-body flex flex-column align-items-center gap-2">
                <input type="hidden" id="id_delete" name="id" />
                <p class="">Are you sure to delete data ?</p>
                <div class="flex gap-2 mt-5">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>

            </div>

        </form> 
          </div>
        </div>
      </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
        $(()=>{
            $('#deleteModal').on('show.bs.modal',function(e){
               $('#id_delete').val($(e.relatedTarget).data('id'))
            })
        })
      </script>
</x-app-layout>
 



 