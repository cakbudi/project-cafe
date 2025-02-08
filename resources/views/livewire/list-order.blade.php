<div class="bg-light p-2 d-flex justify-content-between align-items-center">
    <div class="d-flex flex-column">
        <span class="fw-semibold">{{ $order->customer }} ( {{ $order->dine_in == 1 ? 'Dine In = meja '.$order->meja : 'Take Away' }} )</span>
        <span class="text-secondary" style="font-size: 12px">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$order->tgl)->format('d/m/Y H:i') }}</span> 
        
  
    </div>
    <div>
        <i title="Delete" class="fa fa-x text-danger cursor-pointer" wire:click="confirmDelete({{ $order->id }})"  data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
    </div>
    
 
    {{-- modal --}}
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-body">
              
            Are you sure to delete ? 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-light text-secondary" data-bs-dismiss="modal">Close</button>
            <button wire:click.prevent="deleteOrder()" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
          </div>
        </div>
      </div>
    </div>
    {{-- endmodal --}}

</div>



