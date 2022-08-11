<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    use HasFactory;
    protected $table='moves';
    protected  $fillable=['ombor1_id','ombor2_id'];

    public  function omborxona1(){
        return $this->belongsTo(WareHous::class,'ombor1_id','id');
    }
    public  function omborxona2(){
        return $this->belongsTo(WareHous::class,'ombor2_id','id');
    }
}
