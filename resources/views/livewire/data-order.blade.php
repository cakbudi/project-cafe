<div class="d-flex flex-column gap-2 position-relative p-2" style="max-height: 100vh">
 @forelse ($orders as $order)
  <livewire:list-order :$order :key="$order->id">
@empty
<p class="alert alert-info">Data tidak ditemukan !</p>   
@endforelse


 </div>


 
