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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-2xl">{{ auth()->user()->name }}</h1>
                    <h4>{{ auth()->user()->email }}</h4>
                </div>
            </div>
        </div>

        
    </div>



    

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
        $(()=>{
          
        })
      </script>
</x-app-layout>
 


 