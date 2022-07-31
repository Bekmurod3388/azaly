<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custumer_category extends Model
{
    protected $fillable = [
        'name','sale'
    ];
    use HasFactory;
}
