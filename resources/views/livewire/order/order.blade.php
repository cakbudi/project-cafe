<div class="d-flex justify-content-between position-relative" style="max-height: 100vh">
   <div class="w-100 d-flex flex-column gap-2">
         <livewire:menu/>
   </div>
   
   <div class="w-100 position-relative " style="height: 100vh">
    <livewire:cart/>
    
    <div class="d-flex flex-column gap-1 w-100 position-absolute" style="bottom: 60px;"> 
            <div class="w-100 bg-info text-center text-white p-2 fw-bold rounded" style="bottom: 145px;"> Rp {{ number_format($total,0,'','.') }} </div>
            <button class="w-100 btn btn-danger {{ COUNT($carts) > 0 ? 'btn-primary': 'btn-light'}} w-50" wire:click="clearChart()" {{ COUNT($carts) < 1 ? 'disabled': '' }}>Clear</button>
    
            <div class="btn-group w-100">
                  <button class="w-100 btn {{ COUNT($carts) > 0 ? 'btn-primary': 'btn-light'}} w-50" wire:click="saveOrder()" {{ COUNT($carts) < 1 ? 'disabled': '' }}>Save</button>
                  <a href="{{ route('order.kasir.print') }}" class="w-100 btn {{ COUNT($carts) > 0 ? 'btn-primary': 'btn-light'}} w-50" {{ COUNT($carts) < 1 ? 'disabled': '' }} target="_blank">Print</a>
            </div>
   </div>
   </div>
</div>
