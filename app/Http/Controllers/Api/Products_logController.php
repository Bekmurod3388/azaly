<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product_log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class Products_logController extends Controller
{
    protected Product_log $todo;
    public function __construct(Product_log $todo){

        $this->todo = $todo;
    }

    /**
     *
     * Mahsulot yaratish
     * @OA\Post(
     * path="/api/todo/store",
     * summary="Producta yaratish",
     * description="Product log",
     * tags={"Product_log"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Product_Log id",
     *    @OA\JsonContent(
     *       required={"purchase_id","product_id","sum_came","count","sum_sell_optom","count_sell_optom","sum_sell","shelf_id"},
     *       @OA\Property(property="purchase_id", type="integer", format="purchase_id", example="1"),
     *       @OA\Property(property="product_id", type="integer", format="product_id", example="1"),
     *       @OA\Property(property="sum_came", type="integer", format="sum_came", example="35"),
     *       @OA\Property(property="count", type="integer", format="count", example="35"),
     *       @OA\Property(property="sum_sell_optom", type="integer", format="sum_sell_optom", example="35"),
     *       @OA\Property(property="count_sell_optom", type="integer", format="count_sell_optom", example="35"),
     *       @OA\Property(property="sum_sell", type="integer", format="sum_sell", example="35"),
     *       @OA\Property(property="shelf_id", type="integer", format="shelf_id", example="35"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="qayta ishlanmaydigan tarkib",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Kechirasiz, kiritish toʻldirilgan. Iltimos, yana bir bor urinib ko'ring")
     *        )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Muvaffaqiyatli operatsiyaMuvaffaqiyatli operatsiya"
     *       ),
     *     @OA\Response(
     *          response=400,
     *          description="Dars allaqachon tugagan",
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Tasdiqlanmagan",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Bu harakat ruxsatsiz."
     *      ),
     * )
     */
    public function store(Request $request){
        $todo = $this->todo->createTodo($request->all());

        return response()->json($todo);
    }

    /**
     * Update Product_log
     * @OA\Put(
     *      path="api/todo/update/{id}",
     *     summary="vakansiyani yangilashvakansiyani yangilash",
     *      * tags={"Product_log"},
     *      description="vakansiyani yangilash",
     *     @OA\Parameter(
     *         description="Vakansiya identifikatori",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *      * @OA\RequestBody(
     *    required=true,
     *    description=" hisobga olish ma'lumotlari",
     *    @OA\JsonContent(
     *       required={
     *          "purchase_id",
     *           "product_id",
     *           "sum_came",
     *           "count",
     *           "sum_sell_optom",
     *           "count_sell_optom",
     *           "sum_sell",
     *           "shelf_id",
     *     },
     *       @OA\Property(property="purchase_id", type="number", example="1"),
     *       @OA\Property(property="product_id", type="number", example="1"),
     *       @OA\Property(property="sum_came", type="number", example="23"),
     *       @OA\Property(property="count", type="number", example="3"),
     *       @OA\Property(property="sum_sell_optom", type="number", example="78"),
     *       @OA\Property(property="count_sell_optom", type="number", example="5"),
     *       @OA\Property(property="sum_cell", type="number", example="5"),
     *       @OA\Property(property="shelf_id", type="number", example="3")
     *    )
     * ),
     *      @OA\Response(
     *          response=200,
     *          description="Muvaffaqiyatli operatsiya"
     *       ),
     *      @OA\Response(
     *          response=403,
     *          description="Taqiqlangan"
     *      ),
     *     )
     *
     */
    public function update($id, Request $request){
        try {
            $todo = $this->todo->updateTodo($id,$request->all());
            return response()->json($todo);
        }catch (ModelNotFoundException $exception){
            return response()->json(["msg"=>$exception->getMessage()],404);
        }
    }

    /**
     * Mahsulotni korish
     * @OA\Get(
     *      path="/api/todo/get/{id",
     *      operationId="Productlarni korish",
     *      tags={"Product_log"},
     *      summary="Productlarn korish",
     *      description="Korish",
     *     @OA\Parameter(
     *         description="Product .log -id",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Muvaffaqiyatli operatsiya"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Ob'ekt topilmadi"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Ruxsatsiz"
     *      ),
     *     )
     */
    public function get($id){
        $todo = $this->todo->getTodo($id);
        if($todo){
            return response()->json($todo);
        }
        return response()->json(["msg"=>"Product log elementi topilmadi"],404);
    }

    /**
     * Mahsulotlar roʻyxatini oling
     * @OA\Get (
     *     path="/api/todo/gets",
     *     tags={"Product_log"},
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="rows",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="_id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="purchase_id",
     *                         type="string",
     *                         example="1"
     *                     ),
     *                        @OA\Property(
     *                         property="product_id",
     *                         type="string",
     *                         example="1"
     *                     ),
     *          @OA\Property(
     *                         property="sum_came",
     *                         type="string",
     *                         example="4"
     *                     ),     @OA\Property(
     *                         property="count",
     *                         type="string",
     *                         example="3"
     *                     ),
     *          @OA\Property(
     *                         property="sell_cum_optom",
     *                         type="string",
     *                         example="6"
     *                     ),
     *          @OA\Property(
     *                         property="count_sell_optom",
     *                         type="string",
     *                         example="5"
     *                     ),
     *     @OA\Property(
     *                         property="sum_sell",
     *                         type="string",
     *                         example="3"
     *                     ),
     *     @OA\Property(
     *                         property="shelf_id",
     *                         type="string",
     *                         example="2"
     *                     ),
     *
     *
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function gets(){
        $todos = $this->todo->getsTodo();
        return response()->json(["rows"=>$todos]);
    }

    /**
     * Mahsulotni ochirish
     * @OA\Delete (
     *     path="/api/todo/delete/{id}",
     *     tags={"Product_log"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(property="msg", type="string", example="barcha muvaffaqiyatlarni o'chirish")
     *         )
     *     )
     * )
     */
    public function delete($id){
        try {
            $todo = $this->todo->deleteTodo($id);
            return response()->json(["msg"=>"delete todo success"]);
        }catch (ModelNotFoundException $exception){
            return response()->json(["msg"=>$exception->getMessage()],404);
        }
    }
}
