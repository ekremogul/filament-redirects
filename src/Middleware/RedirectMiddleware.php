<?php

namespace Ekremogul\FilamentRedirects\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;
use Ekremogul\FilamentRedirects\Models\Redirect;

class RedirectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $redirect = Redirect::query()->where('source', $request->getPathInfo())->first();

        if (isset($redirect) && $redirect->enabled) {
            return FacadesRedirect::to($redirect->destination, $redirect->status_code);
        }

        return $next($request);
    }
}
