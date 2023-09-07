<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ApiCallLog;

class LogRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        ApiCallLog::create([
            "request_call" => $request->getUri(),
            "request_fields" => json_encode($request->all())
        ]);
        return $response;
    }
}
