<div class="w-100 p-2"  >
    <input type="search" wire:model.live="search" class="form-control w-100 mb-2" />
    <div class="overflow-scroll row" style="max-height: 90vh">
        @foreach ( $menus as $menu )
        <div class="col-6 col-md-6 col-lg-4 mb-2">
            <div class="card" >
                @if($menu->gambar)
                <img src="{{ asset('storage/images/menu/'.$menu->gambar) }}" class="card-img-top img-thumbnail" alt="...">
                @else
                <img src="{{ asset('storage/images/image.png') }}" class="card-img-top img-thumbnail" alt="...">
                @endif 
                <div class="card-body">
                  <h5 class="card-title">{{ $menu->nama  }}</h5>
                  <p>Rp {{ number_format($menu->harga,0,'','.')  }}</p>
                  <button class="btn btn-primary" wire:click="addtocart({{ $menu->id }})"> Order </button>
                </div>
              </div>
 
        </div>    
        @endforeach
        
    </div>
</div>