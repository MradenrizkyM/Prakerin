<?php

namespace App\Models;

use App\Models\Kota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    use HasFactory;

    protected $fillable = ['kode_provinsi','nama_provinsi'];
    public $timestamps = true;

    public function kota()
    {
        return $this->hasMany('App\Models\Kota','id_provinsi');
    }
}
