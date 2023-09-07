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
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;


class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['page_title'] = 'Report';
        return view('admin.report.report', $data);
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
                        Session::put('user_keyword', $keyword);
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
            ->rawColumns(['action', 'user_id','name', 'email', 'role_type', 'status', 'company_name','city','state','address','last_login_at'])
            ->make(true);
    }

    public function ExportReport(Request $request)
    {
        return Excel::download(new UserExport(), 'user_data'.strtotime(now()).'.xlsx');
    }
}
