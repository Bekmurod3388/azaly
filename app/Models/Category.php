<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','parent_id','slug','img',
    ];
    public function cat2(){
        return  $this->belongsTo(Category::class,'parent_id','id');
    }
}
