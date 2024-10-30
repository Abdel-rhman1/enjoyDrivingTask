<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Providers\RouteServiceProvider;
class ManagerMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd('dd');
        if(User::where('email',session('email'))->first()->user_type=='manger')
            return $next($request);
        else 
            return redirect(route('orders.index'));
    }
}
