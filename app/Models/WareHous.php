<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WareHous extends Model
{
    use HasFactory;
    protected $table='ware_houses';
    protected  $fillable=['name'];
}
