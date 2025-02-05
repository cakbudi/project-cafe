<x-app-layout>

    <x-slot name="header">
        <div class="flex gap-2 justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Role & Permission
           </h2> 

           <div class="flex gap-2">
            <a class="btn btn-primary" href="{{ route('role-permission.index') }}">
                Data
            </a>
           </div>
        </div>
    </x-slot> 

      
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('role-permission.store') }}" method="post">
                        @csrf 
                        <input type="hidden" name="id" value="{{ $role->id }}"/>
                    
                        <div><strong>{{ ucwords($role->name) }}</strong></div>
                        <div class="d-flex gap-3 mb-4">
                            @php
                                $permissions = DB::table('permissions')->get();
                            @endphp
                            @foreach ( $permissions as  $permission)
                                <span>
                                    <input type="checkbox" name="permission[]" value="{{ $permission->name }}" {{ (in_array($permission->name,json_decode($role->getPermissionNames())) ? 'checked' : '') }} /> <span style="font-size: 12px">{{ ucwords($permission->name) }}</span>
                                </span>                                
                            @endforeach
                            
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        </form>       
                    </div>
                </div>

        </div>

        
    </div>
</x-app-layout>
 


 