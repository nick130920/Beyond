<?php

namespace App\Http\Middleware;

use Closure;

class TeacherMiddleware
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
      if (!auth()->user()) {
        return redirect('/login');
      }
      if (!auth()->user()->teacher) {
        return redirect('/student');
      }
        return $next($request);
    }
}
