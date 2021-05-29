<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $fillable = ['type_id', 'sender', 'mail', 'content'];

    public function contactType()
    {
        return $this->hasOne('App\ContactType', 'id', 'type_id');
    }
    public function contactContentTypes()
    {
        return $this->hasMany('App\ContactContentType', 'contact_id', 'id');
    }
}
