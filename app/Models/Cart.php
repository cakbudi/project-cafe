<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable=[
            'tgl_jam',
            'user_id',
            'menu_id',
            'jumlah',
            'customer',
            'dine_in',      
            'meja',      
    ];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}
