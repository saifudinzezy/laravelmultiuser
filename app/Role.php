<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    //membuat func relasi antar tabel
    //ke tabel user
    public function user(){
        return $this->hasMany(User::class);
    }
}
