<?php

namespace App\Models;

use App\Models\Desa;
use App\Models\Kasus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    use HasFactory;

    protected $fillable = ['nama_rw','id_desa'];
    public $timestamps = true;

    public function desa()
    {
        return $this->belongsTo('App\Models\Desa','id_desa');
    }

    public function kasus()
    {
        return $this->hasMany('App/Models/Kasus','id_rw');
    }
}
