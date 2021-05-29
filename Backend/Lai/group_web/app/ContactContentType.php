<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactContentType extends Model
{
    protected $table = 'contact_content_type';
    protected $fillable = ['contact_id', 'name'];

    public function contact()
    {
        return $this->hasOne('App\Contact', 'id', 'contact_id');
    }
}
