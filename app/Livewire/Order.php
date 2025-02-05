<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Order as ModelsOrder;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Order extends Component
{

    public $carts = [];
    public $total = 0;
    
    #[On('refresh-cart')] 
    public function refreshCart()
    {   
        $tot= 0;
         foreach(Cart::where('user_id',Auth::user()->id)->get() as $v){
            $tot= $tot + ($v->jumlah * $v->menu->harga);
        }

        $this->carts =  Cart::where('user_id',Auth::user()->id)->get();
        $this->total = $tot;



        
     }


    public function mount(){

        $this->carts =  Cart::where('user_id',Auth::user()->id)->get();
            
        foreach(Cart::where('user_id',Auth::user()->id)->get() as $v){
            $this->total = $this->total + ($v->jumlah * $v->menu->harga);

        }
        
      
    }

    public function saveOrder(){
        if(COUNT(Cart::where('user_id',Auth::user()->id)->get()) > 0){
            $cart =  Cart::where('user_id',Auth::user()->id)->first();
            $save = ModelsOrder::create([
                'tgl' => date('Y-m-d'),
                'user_id' => $cart->user_id,
                'customer' => $cart->customer,
                'meja' => $cart->meja,
                'dine_in' => $cart->dine_in,
            ]);

            foreach(Cart::where('user_id',Auth::user()->id)->get() as $detail ){
                OrderDetail::create([
                    'order_id' => $save->id,
                    'menu_id' => $detail->menu_id,
                    'jumlah' => $detail->jumlah,
                    'harga' => $detail->menu->harga,


                ]);
            } 

            Cart::where('user_id',Auth::user()->id)->delete();
        }
        
        $this->dispatch('refresh-cart');

         
    }
   
    public function clearChart(){
        Cart::where('user_id',Auth::user()->id)->delete();
        $this->dispatch('refresh-cart');
    }
    
    public function render()
    {
        return view('livewire.order.order');
    }
}
