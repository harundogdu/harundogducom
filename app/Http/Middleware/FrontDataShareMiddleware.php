<?php

namespace App\Http\Middleware;

use App\Models\PersonalInformation;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontDataShareMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $personal = PersonalInformation::find(1);
        View::share('personal', $personal);
        return $next($request);
    }
}
