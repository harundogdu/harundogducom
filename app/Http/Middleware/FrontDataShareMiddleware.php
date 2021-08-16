<?php

namespace App\Http\Middleware;

use App\Models\GeneralSettings;
use App\Models\PersonalInformation;
use App\Models\Services;
use App\Models\SocialMedia;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $shareData = [];
        $shareData['socials'] = DB::table('social_media')
            ->where('status', '=', 1)
            ->orderBy('order', 'asc')
            ->orderBy('name', 'asc')
            ->get();
        $shareData['personal'] = PersonalInformation::find(1);
        $shareData['general'] = GeneralSettings::find(1);
        $shareData['services'] = Services::whereStatus(1)
            ->orderBy('order', 'ASC')
            ->orderBy('title', 'ASC')
            ->get();
        View::share('shareData', $shareData);
        return $next($request);
    }
}
