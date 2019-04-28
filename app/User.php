<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //membuat fungsi utk relasi antar tabel
    //ke tabel user
    public function role(){
        //tambah keterangan roles_id sbg foregn key
        return $this->belongsTo(Role::class, 'roles_id');
    }

    //membuat fun role utk middleware hakakses
    public function punyaRule($namaRule){
        //test
//        dd($this->role);
        //cek jika nama rule di db == nama rule di inputan
        if ($this->role->namaRule == $namaRule){
            //kirim bolean ke yang manggil fungsi ini
            return true;
        }else{
            //kirim bolean ke yang manggil fungsi ini
            return false;
        }
    }
}
