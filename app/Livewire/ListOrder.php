<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Attributes\On;
use Livewire\Component;

class ListOrder extends Component
{
    public $order ="";
    public $delete_id = "";
    

    #[On('get-id')] 
    public function getIdDelete($delete_id)
    {
        $this->delete_id=$delete_id;
    }
    
    public function mount($order){
        $this->order = $order;
        
        
    }

    public function confirmDelete($id){
        $this->dispatch('get-id', delete_id : $id);
        
     }

    public function deleteOrder(){
        Order::find($this->delete_id)->delete();
        $this->dispatch('toast',  message:'Data deleted !',);
        $this->dispatch('refresh');
        // $this->redirectRoute('kasir.dataorder', navigate : true);         
    }

    public function render()
    {
        return view('livewire.list-order');
    }
}
