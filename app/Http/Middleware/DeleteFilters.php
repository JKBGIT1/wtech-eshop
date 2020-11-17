<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DeleteFilters
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
        if (Session::has('filters')) {
            $filters = Session::get('filters');

            if ($filters->category_id != $request->id) {
                Session::put('filters', null);
            }
        }

        return $next($request);
    }
}
