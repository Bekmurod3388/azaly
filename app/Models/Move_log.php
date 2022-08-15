<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Move_log extends Model
{
    protected $table = 'move_log';
    use HasFactory;

    protected $fillable = ['move_id', 'product_id', 'count'];

    public function kochirish()
    {
        return $this->belongsTo(Move::class, 'move_id');
    }
}
