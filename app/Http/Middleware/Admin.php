<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
     $user =  $request->user();
    if($user->roles){
      foreach($user->roles as $role){
        if($role->name == 'admin'){
          return $next($request);
        }
      }
    }
    return  abort(403);
      
    }
        
}
