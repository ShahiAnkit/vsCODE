<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Response;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['page_title'] = 'Category';
        return view('admin.category.list', $data);
    }

    public function indexJson(Request $request)
    {
        $Users = Category::whereNotNull('created_at');
        return DataTables::of($Users)
            ->filter(function ($query) use ($request) {
                if (!empty($request->get('columns'))) {
                    $searchVal = $request->get('columns');
                    $searchKeyword = $request->get('search');
                    if ($searchKeyword['value']) {
                        $keyword = $searchKeyword['value'];
                        $query->where(function ($query) use ($keyword) {
                            $query->orWhere('name', 'like', "%{$keyword}%")
                                  ->orWhere('id', 'like', "%{$keyword}%")
                                  ->orWhere('status', 'like', "%{$keyword}%")
                                  ->orWhere('description', 'like', "%{$keyword}%");
                        });
                    }
                }
                if (!empty($request->get('order'))) {
                    $orderVal = $request->get('order');
                    $col = $orderVal[0]['column'];
                    $dir = $orderVal[0]['dir'];
                    if (!empty($searchVal[$col]['name'])) {
                        $order_by = $searchVal[$col]['name'];
                    } else {
                        $order_by = $searchVal[$col]['data'];
                    }
                    $query->orderBy($order_by, $dir);
                } else {
                    $query->orderBy('updated_at', 'DESC');
                }
            })
            ->editColumn('name', function ($data) {
                return (!empty($data->name)) ? $data->name : "-";
            })
            ->editColumn('description', function ($data) {
                if(!empty($data->description)){
                    if(strlen($data->description)<=45){
                        $desc=substr($data->description, 0, 45);
                    }else{
                        $desc=substr($data->description, 0, 45).'...';
                    }
                }else{
                    $desc="-";
                }
                return $desc;
            })
            ->editColumn('status', function ($data) {
                if ($data->status == "Active") {
                    $status = '<span class="badge badge-primary">Active</span>';
                } else {
                    $status = '<span class="badge badge-danger" >Inactive</span>';
                }
                return $status;
            })
            ->editColumn('id', function ($data) {
            return (!empty($data->id)) ? $data->id : "-";
            })
            ->editColumn('action', function ($data) {
                $editurl=url("category/edit/".$data->id);
                $html ='<td>
                <a style="cursor: pointer;" href="'.$editurl.'" title="Edit" id="update_user"><i class="fa fa-pencil text-primary"></i></a>
                </td><td>
                &nbsp;<a style="cursor: pointer;" onclick="delete_category('.$data->id.')" title="Delete"><i class="fa fa-trash-o text-danger"></i></a>
                </td>';

                return $html;
            })
            ->rawColumns(['action', 'id','name', 'description','status'])
            ->make(true);
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if (!($validator->fails())) {
            Category::create([
                "name"=>$request->name,
                "description"=>$request->description,
                "status"=>$request->status,
            ]);
            return Response::json(['success' => '200']);
        }else{
            return Response::json(['errors' => $validator->errors()]);
        }
    }

    public function edit($categoty_id)
    {
        $categorydata=Category::find($categoty_id);
        return view('admin.category.edit')->with('category',$categorydata);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $category = Category::find($request->category_id);
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if (!($validator->fails())) {
            $category->update([
                "name"=>$request->name,
                "description"=>$request->description,
                "status"=>$request->status,
            ]);
            return Response::json(['success' => '200']);
        }else{
            return Response::json(['errors' => $validator->errors()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Category::where('id',$request->id)->delete();
        return Response::json(['status' => "Success"]);
    }

}
