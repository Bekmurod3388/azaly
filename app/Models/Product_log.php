<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use function PHPUnit\Framework\at;


class Product_log extends Model
{
    protected $table='product_logs';
    protected $fillable = [
        'purchase_id','product_id','count','status','shelf_id','sum_came','sum_sell','sum_sell_optom','count_sell_optom'
    ];
    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function purchases(){
        return $this->belongsTo(Purchases::class,'purchase_id');
    }
    public function shelfs(){
        return $this->belongsTo(Shelf::class,'shelf_id');
    }
    public function  product_api(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function  purchase_api(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Purchases::class,'purchase_id','id');
    }
    public function  shelf_api(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Shelf::class,'shelf_id','id');
    }


    use HasFactory;
    /**
     * @param array $attributes
     * @return Product_log
     */
    public function createTodo(array $attributes){
        $todo = new self();
        $todo->purchase_id = $attributes["purchase_id"];
        $todo->product_id = $attributes["product_id"];
        $todo->sum_came=$attributes['sum_came'];
        $todo->count=$attributes['count'];
        $todo->sum_sell_optom=$attributes['sum_sell_optom'];
        $todo->count_sell_optom=$attributes['count_sell_optom'];
            $todo->sum_sell=$attributes['sum_sell'];
        $todo->shelf_id=$attributes['shelf_id'];
        $todo->save();
        return $todo;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getTodo(int $id){
        $todo = $this->where("id",$id)->first();
        return $todo;
    }

    /**
     * @return Todo[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getsTodo(){
        $todos = $this::all();
        return $todos;
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return mixed
     */
    public function updateTodo(int $id, array $attributes){
        $todo = $this->getTodo($id);
        if($todo == null){
            throw new ModelNotFoundException("Cant find todo");
        }
        $todo->purchase_id = $attributes["purchase_id"];
        $todo->product_id = $attributes["product_id"];
        $todo->sum_came=$attributes['sum_came'];
        $todo->count=$attributes['count'];
        $todo->sum_sell_optom=$attributes['sum_sell_optom'];
        $todo->count_sell_optom=$attributes['count_sell_optom'];
        $todo->sum_sell=$attributes['sum_sell'];
        $todo->shelf_id=$attributes['shelf_id'];
        $todo->save();
        return $todo;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteTodo(int $id){
        $todo = $this->getTodo($id);
        if($todo == null){
            throw new ModelNotFoundException("Todo item not found");
        }
        return $todo->delete();
    }
}
