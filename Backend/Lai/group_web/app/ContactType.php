<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    protected $table = 'contact_type';
    protected $fillable = ['name'];

    public function contacts()
    {
        return $this->hasMany('App\Contact', 'type_id', 'id');
    }
}
