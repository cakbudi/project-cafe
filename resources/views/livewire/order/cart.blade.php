<div>
  <div class="p-2">
        <div class="mb-1 w-100 d-flex justify-content-between bg-light p-2 gap-2 align-items-center">
            <div class="d-flex justify-content-between flex-grow-1">
                <span class="fw-semibold">Customer : {{ $customer }} </span>
                <span class="fw-semibold">Meja : {{ $meja }}</span>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" {{ COUNT($carts) < 1 ? 'disabled': '' }}>
              @if (!$customer)
                <i class="fa fa-user-plus"></i>
              @else
              <i class="fa fa-user"></i>
              @endif
            </button>


 {{-- modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form wire:submit="addCustomer()">
        <div class="modal-content">
        <div class="modal-body">
            <div class="mb-1">
            <label for="customer">Customer</label>
            <input type="text" wire:model="customer" class="form-control" id="customer">
                <div>
                    @error('customer') <span class="error">{{ $message }}</span> @enderror 
                </div>
            </div>
            <div class="mb-1">
                <label for="meja">No. Meja</label>
                <input type="text" wire:model="meja" class="form-control" id="meja">
                <div>
                    @error('meja') <span class="error">{{ $message }}</span> @enderror 
                </div>
            </div>    
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-light text-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
        </div>
      </div>
    </form>
    </div>
  </div>
  {{-- endmodal --}}
        </div>
        
        <div class="mb-1 btn-group w-100">
            <button class="btn {{ $cart_status =='1' ? 'btn-primary': 'btn-outline-secondary'}} w-50" wire:click="dine_in('1')" {{ COUNT($carts) < 1 ? 'disabled': '' }}>Dine In</button>
            <button class="btn {{ $cart_status == '0' ? 'btn-primary': 'btn-outline-secondary'}} w-50" wire:click="dine_in('0')" {{ COUNT($carts) < 1 ? 'disabled': '' }}>Take Away</button>
        </div>
        
        <div class="overflow-scroll" style="max-height: 300px">
        <div class="d-flex flex-column gap-2">
            @php
            $totalbayar = 0;    
            @endphp
            @forelse ($carts as $cart )
            @php
                $totalbayar = $totalbayar + ($cart->jumlah * $cart->menu->harga);
            @endphp
            <div class="d-flex gap-1 border-bottom py-1">
                        @if($cart->menu->gambar)
                        <img src="{{ asset('storage/images/menu/'.$cart->menu->gambar) }}" class="img-thumbnail" style="width: 50px;height:50px"  /> 
                        @else
                        <img src="{{ asset('storage/images/image.png') }}"  class="img-thumbnail" style="width: 50px;height:50px"   /> 
                        @endif

                        <div class="d-flex justify-content-between w-100 align-items-center px-3">
                            <div>
                                <span class="fw-semibold">{{ $cart->menu->nama }}</span><br/>
                                <span>{{ $cart->jumlah }} x {{ number_format($cart->menu->harga,0,'','.') }}</span>
                            </div>
                            <i class="fa fa-x text-danger cursor-pointer" wire:click="deleteCart({{ $cart->id }})"></i>
                        </div>

            </div>
            
            @empty
            <div class="d-flex justify-content-center" style="padding-top:50px">
              <i class="fa fa-shopping-cart text-light" style="font-size: 100px"></i>
            </div>
            @endforelse

            @if (COUNT($carts) > 0)
            
            <div class="d-flex justify-content-between w-100 align-items-center px-3">
              <span>Total</span>
              <span>Rp {{ $total }}</span>
            </div> 
            <div class="d-flex justify-content-between w-100 align-items-center px-3">
              <span>Pajak</span>
              <span>{{ $pajak }} %</span>
            </div> 
            @endif

        </div>
      </div>
 
        
    </div>

    


</div>


