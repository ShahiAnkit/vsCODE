<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
use DB;
use App\Models\User;
use App\Models\SearchKeyword;
use Session;

class ReportExport implements FromCollection, WithHeadings
{

    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $request;

    protected $user_id;

    function __construct($user_id)
    {
        $this->user_id =$user_id;
    }


    public function collection()
    {
        $Users = User::find($this->user_id);

        if($Users->role_type=="Admin"){
            $reports = SearchKeyword::orderBy('id','DESC')->get();
        }else{
            $reports = SearchKeyword::where('user_id',$Users->id)->orderBy('id','DESC')->get();
        }


        $exportdata = [];
        if (!empty($reports)) {
            foreach ($reports as $key => $report) {
                $data_array=[];
                $productData =$report->keywordProduct()->get();
                if(@$productData && count($productData)>0){
                    foreach ($productData as $product){
                        $data_array[]= [
                            'ID' => $key+1,
                            'Date' =>date("d/m/Y h:i A",strtotime($report->created_at)),
                            'Keyword' => $report->keyword,
                            'Product Id' => $product->product()->id,
                            'Name' =>$product->product()->name,
                            'Category' => $product->product()->category,
                            'isAllowed' => $product->product()->isAllowed,
							'Remarks' => $product->product()->Remarks,
							'Manufacturer' => $product->product()->Manufacturer, 
							'Source' => $product->product()->Source,
                        ];
                    }
                }else{
                    $data_array= [
                        'ID' => $key+1,
                        'Date' =>date("d/m/Y h:i A",strtotime($report->created_at)),
                        'Keyword' => $report->keyword,
                        'Product Id' => "",
                        'Name' =>"",
                        'Category' =>"",
						'isAllowed' =>"",
						'Remarks' =>"",
						'Manufacturer' =>"",
                        'Source' => "",
                    ];
                }
                $exportdata[] = $data_array;
            }
        }
        return collect($exportdata);
    }

    public function headings(): array
    {
        $headings = [
            "ID",
            "Date",
            "Keyword",
            "Product Id",
            "Name",
            "Category",
			"isAllowed",
			"Remarks",
			"Manufacturer",
            "Source"
        ];
        return $headings;
    }
}
