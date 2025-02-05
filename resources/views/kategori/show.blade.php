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
                <ul>
                 @foreach ( $kategori->menus as $v )
                     <ol>{{ $v->nama }}</li>
                 @endforeach
                </ul>
            </div>
           </div>
        </div>
    </div>
</x-app-layout>
 


 