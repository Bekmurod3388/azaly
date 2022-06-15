<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_warehouse extends Model
{
    protected $fillable = [
      'shelf_id','product_id','count','size_id',
    ];
    use HasFactory;
}
