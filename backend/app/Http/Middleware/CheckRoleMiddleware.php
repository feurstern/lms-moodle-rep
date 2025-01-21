<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // dd('xoxo');
        $user = User::find($request->user_id);
        // dd($user);

        // we can pass the role parameter in to the validation;
        // $user->role === $role
        return $user->role === "admin" ? $next($request) : abort(403);
    }
}
