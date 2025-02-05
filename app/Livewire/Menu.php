<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Menu as ModelsMenu;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
 
class Menu extends Component
{
    
    public $menus = "";
    public $search ="";
    public $menu_id ="";

    public function addtocart($id){
        $ceksama = Cart::where(['menu_id'=>$id, 'user_id' => Auth::user()->id])->get();
        if(COUNT($ceksama) < 1){
          Cart::create([
                'user_id'=>Auth::user()->id,
                'menu_id'=>$id,
                'jumlah'=>1,
                'customer'=>'',
                'meja'=>'',
            ]);
            
            
        }else{
            
            $cart = Cart::where(['menu_id'=>$id, 'user_id' => Auth::user()->id])->first(); 
            $cart->update([
                'jumlah'=>1 + $cart->jumlah,
            ]);

           

        }
        $this->dispatch('refresh-cart');
    }
     
    public function render()
    {   
        $this->menus = ModelsMenu::where('nama','like',$this->search.'%')->get();
        return view('livewire.order.menu',['menus'=>$this->menus]);
    }
}
