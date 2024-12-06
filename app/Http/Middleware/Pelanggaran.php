<?php

namespace App\Http\Middleware;

use App\Models\UsersPelanggarans;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Pelanggaran
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
        $userId = Auth::id();

        $pelanggaran = UsersPelanggarans::where('user_id', $userId)
            ->first();

        if ($pelanggaran) {
            Auth::logout();
            return redirect('/')->with('error', 'Mohon maaf akun anda tidak bisa melanjutkan tes, silahkan untuk menghubungi kami.');
        }

        return $next($request);
    }
}
