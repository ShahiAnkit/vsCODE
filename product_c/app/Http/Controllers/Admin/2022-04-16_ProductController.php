<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\SearchKeyword;
use App\Models\SearchKeywordProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Response;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Session;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['page_title'] = 'NDPS Drug Search';
        $data['searchkeyword'] = SearchKeyword::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        return view('admin.product.searchproduct', $data);
    }

    public function searchProduct(Request $request){

        $keyword =$request->keyword['term'];
        $searchProduct=Product::where('name', 'like', "%{$keyword}%")->get();
        return $searchProduct;
    }

    public function getKeywordData(){
        $searchkeyword=SearchKeyword::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        $table="";
        if(!empty($searchkeyword)){
            foreach ($searchkeyword as $key=>$keyword){
                $i=$key+1;
                $table .='<tr>
                    <td>'.$i.'</td>
                    <td>'.date("d/m/Y h:i A",strtotime($keyword->created_at)).'</td>
                    <td>'.$keyword->keyword.'</td>
                    <td>
                        <table style="width: 100%">';
                            if(!empty($keyword->keywordProduct()->get())){
                                foreach ($keyword->keywordProduct()->get() as $product){
                                    $table .='<tr>
                                        <td style="width: 10%">'.$product->product()->id.'</td>
                                        <td style="width: 30%">'.$product->product()->name.'</td>
                                        <td style="width: 30%">'.$product->product()->category.'</td>
                                        <td style="width: 30%">'.$product->product()->isAllowed.'</td>
                                    </tr>';
                                }
                            }
                    $table .='</table>
                    </td>
                </tr>';
            }
        }
        return Response::json(['data' => $table]);
    }

    public function indexJson(Request $request)
    {
        $Product=[];
        if(!empty($request->id)){
            $Product = Product::where('id',$request->id)->get();
            $Productata = Product::where('id',$request->id)->first();
            $keywordData=SearchKeyword::create([
                'user_id'=>Auth::user()->id,
                'keyword'=>$Productata->name
            ]);
            SearchKeywordProduct::create([
                'keyword_id'=>$keywordData->id,
                'product_id'=>$Productata->id
            ]);
        }else if(!empty($request->keyword)){
            $Product = Product::where('name', 'like', "%{$request->keyword}%")->get();
            $keywordData=SearchKeyword::create([
                'user_id'=>Auth::user()->id,
                'keyword'=>$request->keyword
            ]);
            if(!empty($Product)){
                foreach($Product as $pro){
                    SearchKeywordProduct::create([
                        'keyword_id'=>$keywordData->id,
                        'product_id'=>$pro->id
                    ]);
                }
            }
        }
        return DataTables::of($Product)
            ->editColumn('id', function ($data) {
                return (!empty($data->id)) ? $data->id : "-";
            })
            ->editColumn('name', function ($data) {
                return (!empty($data->name)) ? $data->name : "-";
            })
            ->editColumn('created_at', function ($data) {
                return (!empty($data->created_at)) ? date("d/m/Y h:i A",strtotime($data->created_at)) : "-";
            })
            ->editColumn('category', function ($data) {
                return (!empty($data->category)) ? $data->category : "-";
            })
            ->editColumn('price', function ($data) {
                return (!empty($data->price)) ? $data->price : "-";
            })
            ->rawColumns(['id','name', 'category', 'price','created_at'])
            ->make(true);
    }

    public function ExportReport(Request $request)
    {
        return Excel::download(new UserExport(), 'user_data'.strtotime(now()).'.xlsx');
    }
}
