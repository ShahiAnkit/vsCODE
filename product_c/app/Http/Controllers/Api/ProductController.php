<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Product;
use Response;
use Illuminate\Support\Str;
use Session;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use ResponseTrait;

    /**
     *  @OA\Post(
     *      path="/api/v1/product/search",
     *      tags={"Product"},
     *      summary="Search Product",
     *      operationId="Search Product",
     *      @OA\Parameter(
     *          name="keyword",
     *          required=true,
     *          in="query",
     *          example="Sony Tv",
     *          description="",
     *          @OA\Schema(
     *          type="string",
     *         ),
     *       ),
     *       @OA\Parameter(
     *          name="start",
     *          in="query",
     *          required=false,
     *          example="0",
     *          @OA\Schema(
     *              type="number"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          required=false,
     *          example="10",
     *          @OA\Schema(
     *              type="number"
     *          )
     *      ),
     *      @OA\Response(
     *         response=200,
     *         description="json schema",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Invalid Request"
     *     ),
     *     security={
     *      {"bearerAuth":{}}
     *     }
     * )
     */

    public function searchProduct(Request $request)
    {
        $keyword =$request->keyword;
        $start=$request->start;
        $limit=$request->limit;
        if(!empty($limit)){
            $searchProduct=Product::where('name', 'like', "%{$keyword}%")->select('id','name','code','category','isAllowed','remarks','manufacturer','source','description')->skip($start)->limit($limit)->get();
        }else{
            $searchProduct=Product::where('name', 'like', "%{$keyword}%")->select('id','name','code','category','isAllowed','remarks','manufacturer','source','description')->get();
        }

        return $this->sendResponse(200, 'Product List.', $searchProduct);
    }

    /**
     *  @OA\Post(
     *      path="/api/v1/product/details",
     *      tags={"Product"},
     *      summary="Product Details",
     *      operationId="Product Details",
     *      @OA\Parameter(
     *          name="product_id",
     *          required=true,
     *          in="query",
     *          example="1",
     *          description="",
     *          @OA\Schema(
     *          type="string",
     *         ),
     *       ),
     *     @OA\Response(
     *         response=404,
     *         description="Invalid Request"
     *     ),
     *     security={
     *      {"bearerAuth":{}}
     *     }
     * )
     */

    public function productDetails(Request $request)
    {
        $rules = [
            'product_id' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->sendResponse(400,$validator->errors());
        }

        $productDetails=Product::find($request->product_id);
        if(!empty($productDetails)){
            return $this->sendResponse(200, 'Drug Details.', $productDetails);
        }else{
            return $this->sendResponse(400, 'Invalid Drug id');
        }

    }
}
