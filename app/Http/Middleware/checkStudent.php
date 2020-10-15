<?php

namespace App\Http\Middleware;

use Closure;

class checkStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->role == 2){
            return $next($request);
        }else {
            return redirect('teacherHome')->with('unsuccess','Permission Denied');
        }
        
    }
}
