<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    //
    use SoftDeletes;
    protected $fillable =[
            'order_id',
            'menu_id',
            'jumlah',
            'harga',
            'status',
    ];

    public function menu(){
        $this->belongsTo(Menu::class);
    }
}
