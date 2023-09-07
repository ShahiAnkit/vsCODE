<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\SearchKeyword;
use App\Models\UserLoginInfo;
use Response;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['user']='App\Models\User'::count();
        $data['category']='App\Models\Category'::count();
        $data['product']='App\Models\Product'::count();
        $data['search']='App\Models\SearchKeyword'::count();
        $data['usersearch']=SearchKeyword::where('user_id',Auth::user()->id)->count();
        return view('home',$data);
    }

    public function getSearchChart(){
        $last7date = $this->get7DaysDates(7);
        $keywordarray =[];
        if(!empty($last7date) && count($last7date)>0){
            foreach($last7date as $key=>$date){
                $count = SearchKeyword::whereDate('created_at', $date)->count();
                $day =date('d',strtotime($date));
                array_push($keywordarray,[(int)$day,$count]);
            }
        }
        return Response::json(['data' => $keywordarray]);
    }

    public function getLoginChart(){
        $last7date = $this->get7DaysDates(7);
        $loginarray =[];
        if(!empty($last7date) && count($last7date)>0){
            foreach($last7date as $key=>$date){
                $count = UserLoginInfo::whereDate('last_login_at', $date)->count();
                $day =date('d M',strtotime($date));
                $loginarray[]=array(
                    "y"=>$day,
                    "a"=>$count
                );
            }
        }
        return Response::json(['data' => $loginarray]);

    }

    public function get7DaysDates($days, $format = 'Y-m-d'){
        $m = date("m"); $de= date("d"); $y= date("Y");
        $dateArray = array();
        for($i=0; $i<=$days-1; $i++){
            $dateArray[] = date($format, mktime(0,0,0,$m,($de-$i),$y));
        }
        return array_reverse($dateArray);
    }

    public function usersearchKeyword(){
        $date = Carbon::now()->subDays(7);
        $keyword=SearchKeyword::where('user_id',Auth::user()->id)->whereDate('created_at','>=',$date)->orderBy('id',"DESC");
        return DataTables::of($keyword)
            ->editColumn('id', function ($data) {
                return (!empty($data->id)) ? $data->id : "-";
            })
            ->editColumn('keyword', function ($data) {
                return (!empty($data->keyword)) ? $data->keyword : "-";
            })
            ->editColumn('created_at', function ($data) {
                return (!empty($data->created_at)) ? date("d/m/Y h:i A",strtotime($data->created_at)) : "-";
            })
            ->rawColumns(['id','keyword','created_at'])
            ->make(true);
    }
}
