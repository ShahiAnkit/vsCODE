<?php
namespace App\Http\Traits;

trait ResponseTrait
{
     /*Send API Response*/
     public function sendResponse($status_code,$message,$data=''){
        $response =['STATUS_CODE' => $status_code,
            'MESSAGE' => $message,
            'DATA' => $data
        ];
        $response_json=json_encode($response,true);
        return $response_json;
    }
}
?>
