<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'name','buy_sum','sell_sum','sell_sale_sum','sale_count','category_id','sale',
    ];
    use HasFactory;
}
