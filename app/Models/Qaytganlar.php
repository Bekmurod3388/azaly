<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Qaytganlar extends Model
{
    protected $fillable = [
        'soni','product_id','shelf_id','agent_id'
    ];

    public function maxsuloti(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function polkasi(){
        return $this->belongsTo(Shelf::class,'shelf_id');
    }
    public function agenti(){
        return $this->belongsTo(Agent::class,'agent_id');
    }

    use HasFactory;
}
