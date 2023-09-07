<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Response;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Session;
use Carbon\Carbon;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['page_title'] = 'Users';
        $data['users'] = User::all();
        return view('admin.users.list', $data);
    }

    public function profile()
    {
        $data['page_title'] = 'Profile';
        $data['user'] = User::find(Auth::user()->id);
        return view('admin.users.profile', $data);
    }

    public function indexJson(Request $request)
    {
        $Users = User::whereNotNull('created_at');
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
                                  ->orWhere('city', 'like', "%{$keyword}%")
                                  ->orWhere('email', 'like', "%{$keyword}%")
                                  ->orWhere('state', 'like', "%{$keyword}%")
                                  ->orWhere('company_name', 'like', "%{$keyword}%")
                                  ->orWhere('role_type', 'like', "%{$keyword}%")
                                  ->orWhere('address', 'like', "%{$keyword}%");
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
            ->editColumn('company_name', function ($data) {
                return (!empty($data->company_name)) ? $data->company_name : "-";
            })
            ->editColumn('email', function ($data) {
                return (!empty($data->email)) ? $data->email : "-";
            })
            ->editColumn('city', function ($data) {
                return (!empty($data->city)) ? $data->city : "-";
            })
            ->editColumn('state', function ($data) {
                return (!empty($data->state)) ? $data->state : "-";
            })
            ->editColumn('address', function ($data) {
                return (!empty($data->address)) ? $data->address : "-";
            })
            ->editColumn('role_type', function ($data) {
                return $data->role_type;
            })
            ->editColumn('last_login_at', function ($data) {
                return (!empty($data->last_login_at)) ? date("d/m/Y h:i A",strtotime($data->last_login_at)) : "-";
            })
            ->editColumn('status', function ($data) {
                if ($data->status == "Unlock") {
                    $status = '<span class="badge badge-primary">Unlock</span>';
                } else {
                    $status = '<span class="badge badge-danger">Lock</span>';
                }
                return $status;
            })
            ->editColumn('user_id', function ($data) {
            return (!empty($data->id)) ? 'E' . $data->id : "-";
            })
            ->editColumn('action', function ($data) {
                $editurl=url("user/edit/".$data->id);
                $passurl=url("user/change-password/".$data->id);
                $html ='<td><a class="mr-2" style="cursor: pointer;" href="'.$editurl.'" title="Edit" id="update_user"><i class="fa fa-pencil text-primary"></i></a></td>
                <td><a class="mr-2" style="cursor: pointer;" href="'.$passurl.'" title="Change Password" id="update_user"><i class="ti-reload text-purple"></i></a></td>
                <td><a class="mr-2" style="cursor: pointer;" onclick="delete_user('.$data->id.')" title="Delete"><i class="fa fa-trash-o text-danger"></i></a></td>';

                return $html;
            })
            ->rawColumns(['action', 'user_id','name', 'email', 'role_type', 'status', 'company_name','city','state','address','last_login_at'])
            ->make(true);
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'company_name' => 'required'
        ]);

        if (!($validator->fails())) {
            User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>Hash::make($request->password),
                "password_value"=>base64_encode($request->password),
                "company_name"=>$request->company_name,
                "city"=>$request->city,
                "state"=>$request->state,
                "address"=>$request->address,
                "role_type"=>$request->role_type,
                "status"=>$request->status,
            ]);
            return Response::json(['success' => '200']);
        }else{
            return Response::json(['errors' => $validator->errors()]);
        }
    }

    public function edit($user_id)
    {
        $userdata=User::find($user_id);
        return view('admin.users.edit')->with('user',$userdata);
    }

    public function editProfile()
    {
        $userdata=User::find(Auth::user()->id);
        return view('admin.users.editprofile')->with('user',$userdata);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $user = User::find($request->user_id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$request->user_id,
            'company_name' => 'required'
        ]);

        if (!($validator->fails())) {
            $user->update([
                "name"=>$request->name,
                "email"=>$request->email,
                "company_name"=>$request->company_name,
                "city"=>$request->city,
                "state"=>$request->state,
                "address"=>$request->address,
                "role_type"=>$request->role_type,
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
        User::where('id',$request->id)->delete();
        return Response::json(['status' => "Success"]);
    }

    public function newPass($user_id){
        $userdata=User::find($user_id);
        if($userdata){
            return view('admin.users.changepassword')->with('user',$userdata);
        }else{
            Session::flash('error_msg', 'User not exist!');
            return redirect('/users');
        }
    }

    public function changePassword(Request $request){
        $userdata=User::find($request->user_id);
        if($userdata){
            $userdata->update([
                "password"=>Hash::make($request->password),
                "password_value"=>base64_encode($request->password),
            ]);
            Session::flash('success_msg', 'Password change successfully!');
            return Response::json(['status' => "success"]);
        }else{
            return Response::json(['status' => "error",'message'=>"User not exist!"]);
        }
    }

    public function showChangePassword(){
        $userdata=User::find(Auth::user()->id);
        return view('admin.users.changepass')->with('user',$userdata);
    }

}
