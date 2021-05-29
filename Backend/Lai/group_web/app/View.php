<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $table = 'view';
    protected $fillable = ['name', 'content', 'phone', 'address', 'time_open', 'time_close'];

    // public function productType()
    // {
    //     return $this->hasOne('App\ProductType', 'id', 'type_id');
    // }
    // public function productImgs()
    // {
    //     return $this->hasMany('App\ProductImg', 'product_id', 'id');
    // }
}
