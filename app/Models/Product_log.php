<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_log extends Model
{
    protected $fillable = [
        'purchase_id','product_id','count','current_count','status','shelf_id','sum_came'
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
    public function  product_api(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function  purchase_api(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Purchases::class,'purchase_id','id');
    }
    public function  shelf_api(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Shelf::class,'shelf_id','id');
    }


    use HasFactory;
}
