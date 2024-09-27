<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class userAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userage= $request['age'];
        if($userage>=20){
            return redirect()->route('temp');
        }else{
            return $next($request);
        }

        // if(Auth::check()){
        //     return $next($request);
        // }else{
        //     return redirect()->route(login);
        // }

    }
}
