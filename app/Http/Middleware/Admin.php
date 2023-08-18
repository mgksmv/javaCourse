<?php

namespace App\Http\Middleware;

use App\Enums\RoleEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()) {
            if (Auth::user()->role !== RoleEnum::ADMIN->name) {
                Auth::logout();

                return redirect()->route('login')->withErrors([
                    'username' => 'Неверное имя пользователя или пароль.',
                ]);
            }

            return $next($request);
        }

        return redirect()->route('login');
    }
}
