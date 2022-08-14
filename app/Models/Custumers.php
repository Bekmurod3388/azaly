<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custumers extends Model
{
    use HasFactory;
    protected $fillable=[
        'name', 'received_goods ', 'bonus_money', 'phone', 'passport', 'discount', 'keashback', 'categorea'
    ];
    public function category(){
        return $this->belongsTo(Custumer_category::class,'category_id');
    }
}
