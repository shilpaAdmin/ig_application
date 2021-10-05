<?php
namespace App\Http\Middleware;
use Closure;

use Auth;

class CheckApiHashToken
{
    public function handle($request, Closure $next)
    {
        $registerIdFromRequest = $request->input('RegisterId');
        if(isset($registerIdFromRequest) && !empty($registerIdFromRequest))
        {
            if (Auth::guard('api')->check()) 
            {
                return $next($request);
            } 
            else 
            {
                 return response()->json(['Status'=>False,'StatusMessage'=>'You are not authenticated to this service','Result'=>array()]);
            }
        }
        else
        {
            return $next($request);
        }
    }
}
