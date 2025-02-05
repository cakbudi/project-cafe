<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    //
    use SoftDeletes;
    protected $fillable =['nama'];

    public function menus(){
        return $this->hasMany(Menu::class);
    }
}
