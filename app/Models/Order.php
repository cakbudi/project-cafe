<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    //
    use SoftDeletes;
    protected $fillable =[
        'tgl_jam',
        'user_id',
        'customer',
        'dine_in',
        'meja',
    ];
}
