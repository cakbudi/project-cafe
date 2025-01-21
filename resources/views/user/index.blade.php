<x-app-layout>
   

    <x-slot name="header">
        <div class="flex gap-2 justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data User
           </h2> 

           <div class="flex gap-2">
                <a href="#" class="bg-purple-800 hover:bg-purple-700 p-2 rounded-md border text-white"> Create </a>                
               {{-- inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150 --}}
           </div>
        </div>
        
    </x-slot> 


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <table class="w-full border-collapse border">
                    <thead>
                        <tr>
                            <th class="border p-2">No</th>
                            <th class="border p-2 text-start">Nama</th>
                            <th class="border p-2 text-start">Email</th>
                            <th class="border p-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ( $users as $user )
                             <tr>
                                <td class="text-center border px-2">{{ $loop->iteration }}</td>
                                <td class="border px-2">{{ $user->name }}</td>
                                <td class="border px-2">{{ $user->email }}</td>
                                <td class="text-center border px-2"> 
                                   
                                </td>
                             </tr>
                         @endforeach
                    </tbody>
                   </table>



              
                  
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 


 