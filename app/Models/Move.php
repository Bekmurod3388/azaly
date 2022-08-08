<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    use HasFactory;
    protected $table='moves';
    protected  $fillable=['ombor1_id','ombor2_id'];
    public  function ware_house(){
        return $this->belongsTo(WareHous::class,'ombor1_id','id');
    }
}
