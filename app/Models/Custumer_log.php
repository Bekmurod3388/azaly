<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custumer_log extends Model
{
    protected $fillable = [
        'product_id','custumer_id','custumer_category_id','price','count'
    ];
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function customer_category(){
        return $this->belongsTo(Custumer_category::class,'custumer_category_id');
    }
    use HasFactory;
}
