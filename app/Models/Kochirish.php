<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kochirish extends Model
{
    use HasFactory;
    protected $table='kochirishes';
    protected  $fillable=['ombor1','ombor2'];
    public  function ware_house(){
        return $this->belongsTo(WareHous::class,'ware_house_id','id');
    }
}
