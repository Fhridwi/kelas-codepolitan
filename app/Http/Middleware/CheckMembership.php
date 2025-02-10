<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class CheckMembership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            if( !$request->membership == true ){
                return redirect('/pricing');
            }

            Log::info('Before Request:' , [
                'url' => $request->url(),
                'params' => $request->all(),
            ]);

        $respone =  $next($request);

        sleep(2);

            Log::info('After Request:' , [
               'status' => $respone->getStatusCode(),
               'content' => $respone->getContent(),
            ]);

            return $respone;
    }
}
