<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class roleManagement
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next, string $role): Response
  {
    if ($request->user()->role !== $role) {
      Auth::logout();
      return redirect()->route('login')->with('error', 'You do not have access to this page.');
    }
    return $next($request);
  }
}
