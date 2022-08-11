<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Product extends Model
{
    protected $fillable = [
        'name', 'code', 'status', 'artikul','sum_sell','sum_sell_optom','count_sell_optom','category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function shelf_uchun()
    {
        return $this->belongsTo(Product_log::class, 'product_id');
    }

    public function category_api(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    use HasFactory;
}
