<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sendback extends Model
{
    use HasFactory;
    protected $fillable=['polka_id','agent_id','tovar_id','soni'];
}
