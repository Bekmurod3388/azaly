<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_log extends Model
{
    protected $fillable = [
        'purchase_id','product_id','count','status','shelf_id','sum_came','sum_sell','sum_sell_optom','count_sell_optom'
    ];
    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function purchases(){
        return $this->belongsTo(Purchases::class,'purchase_id');
    }
    public function shelfs(){
        return $this->belongsTo(Shelf::class,'shelf_id');
    }

    use HasFactory;
}
