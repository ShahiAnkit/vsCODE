<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
use DB;
use App\Models\User;
use Session;

class UserExport implements FromCollection, WithHeadings
{

    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $request;


    function __construct()
    {
    }


    public function collection()
    {
        $Users = User::whereNotNull('created_at');

        if (Session::has('user_keyword') && !empty(Session::get('user_keyword'))) {
            $keyword = Session::get('user_keyword');
            $Users->where(function ($query) use ($keyword) {
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

        $Users = $Users->get();
        $exportdata = [];
        if (!empty($Users)) {
            foreach ($Users as $key => $user) {
                $data_array = [
                    'User ID' => $user->id,
                    'Name' => $user->name,
                    'Email' => $user->email,
                    'Company Name' => $user->company_name,
                    'City' => $user->city,
                    'State' => $user->state,
                    'Address' => $user->address,
                    'Role' => $user->role,
                    'Status' => $user->status,
                    'Last Login at' => $user->last_login_at,

                ];
                $exportdata[] = $data_array;
            }
        }
        return collect($exportdata);
    }

    public function headings(): array
    {
        $headings = [
            "User ID",
            "Name",
            "Email",
            "Company Name",
            "City",
            "State",
            "Address",
            "Role",
            "Status",
            "Last Login at"
        ];
        return $headings;
    }
}
