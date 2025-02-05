<x-app-layout>

    <x-slot name="header">
        <div class="flex gap-2 justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Kategori
           </h2> 

           <div class="flex gap-2">
            <a class="btn btn-primary" href="{{ route('kategori.create') }}">
                Create
            </a>
           </div>
        </div>
        
    </x-slot> 

     
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-body">
 
                   <table class="table">
                    <thead>
                        <tr>
                            <th class="">No</th>
                            <th class="text-start">Nama</th>
                            <th class=""></th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ( $kategori as $kategori )
                             <tr>
                                <td class="">{{ $loop->iteration }}</td>
                                <td class="">{{ $kategori->nama }}</td>
                                <td class="text-center"> 
                                    <a href="{{ route('kategori.show',$kategori->id) }}" title="Edit"><i class="fa-solid fa-info-circle text-info cursor-pointer"></i></a>
                                    <a href="{{ route('kategori.edit',$kategori->id) }}" title="Edit"><i class="fa-solid fa-pencil text-warning cursor-pointer"></i></a>
                                    <i class="fa-solid fa-trash text-danger cursor-pointer" data-id="{{ $kategori->id }}" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>
                                </td>
                             </tr>
                         @endforeach
                    </tbody>
                   </table>



              
                  
                 
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
           
            <form action="{{ route('kategori.delete') }}" method="post">
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
 


 