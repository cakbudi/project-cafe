<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class DataOrder extends Component
{


    public $orders = [];  

    #[On('refresh')] 
    public function refresh()
    {
        $this->orders = Order::get();
    }

    public function mount(){
        $this->orders = Order::where('tgl','LIKE',date('Y-m-d').'%')->get();
       
    }
     
    
    public function render()
    {
        return view('livewire.data-order');
        Toaster::success('User created!'); 
    }
}
