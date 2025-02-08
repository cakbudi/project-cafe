<?php

namespace App\Livewire;

use App\Models\Cart as ModelsCart;
use App\Models\pajak;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On; 
use Livewire\Attributes\Validate; 

class Cart extends Component
{
    #[Validate('required')] 
    public $customer = '';
 
    #[Validate('required')] 
    public $meja = '';
    
    public $pajak = '';
    public $carts = [];
    public $cart_status = '';
    public $total = '-';
 
    #[On('refresh-cart')] 
    public function refreshCart()
    {
        $this->carts = ModelsCart::where('user_id',Auth::user()->id)->get();
        $cekGetCart = ModelsCart::where('user_id',Auth::user()->id)->get();
        if(COUNT($cekGetCart) < 1){
            $this->cart_status = '';
            $this->customer = '';
            $this->meja = '';
            $this->pajak = '';
        }else{
            $getCart = ModelsCart::where('user_id',Auth::user()->id)->first();
            $pajak = Pajak::whereNull('deleted_at')->first();
            $this->cart_status = $getCart->dine_in;
            $this->customer = $getCart->customer;
            $this->meja = $getCart->meja;
            $this->pajak = $pajak->pajak;
        }


     }

    public function mount(){
        $this->carts = ModelsCart::where('user_id',Auth::user()->id)->get();
        
        $cekGetCart = ModelsCart::where('user_id',Auth::user()->id)->get();
        if(COUNT($cekGetCart) < 1){
            $this->cart_status = '';
            $this->customer = '';
            $this->meja = '';
            $this->pajak = '';
        }else{
            $getCart = ModelsCart::where('user_id',Auth::user()->id)->first();
            $pajak = Pajak::whereNull('deleted_at')->first();
            $this->cart_status = $getCart->dine_in;
            $this->customer = $getCart->customer;
            $this->meja = $getCart->meja;
            $this->pajak = $pajak->pajak;
        }

         

    }

    public function dine_in($dine){
        ModelsCart::where('user_id',Auth::user()->id)->update(['dine_in'=>$dine]);
        $this->cart_status =$dine;
    }    
    
    
    public function deleteCart($id){
        ModelsCart::find($id)->delete();
        $this->dispatch('refresh-cart');
     }    
    
    public function addCustomer(){
        $this->validate(); 
 
        ModelsCart::where('user_id',Auth::user()->id)
            ->update([
                'customer'=>$this->customer,
                'meja'=>$this->meja,
            ]
            );
 
        //  $this->dispatch('refresh-cart');
    }    

    public function render()
    {
        return view('livewire.order.cart');
    }
}
