<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kochirilganlar extends Model
{
    protected $table='kochirish_log';
    use HasFactory;
    protected  $fillable=['kochirish_id','nomi','soni','bahosi'];
    public  function kochirish(){
        return $this->belongsTo(Kochirish::class);
    }
}
