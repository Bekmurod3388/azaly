<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $fillable = [
        'warehouse_id','kontragent_id','AllSum'
    ];

    public function omborlar(){
       return $this->belongsTo(WareHous::class,'warehouse_id','id');
    }

    public function agentlar(){
       return $this->belongsTo(Agent::class,'kontragent_id');
    }


    use HasFactory;
}
