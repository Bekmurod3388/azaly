<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custumer_log extends Model
{
    protected $fillable = [
        'custumer_id','product_id','custumer_category_id','price','count'
    ];
    public function custumer(){
        return $this->belongsTo(Custumers::class,'custumer_id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    use HasFactory;
}
