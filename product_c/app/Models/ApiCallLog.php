<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiCallLog extends Model
{

	protected $table = 'api_call_logs';
    protected $fillable = [
        'request_call', 'request_fields','created_by','updated_by','deleted_by'
    ];
}
