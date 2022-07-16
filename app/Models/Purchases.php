<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $fillable = [
        'warehouse_id','kontragent_id'
    ];

    use HasFactory;
}
