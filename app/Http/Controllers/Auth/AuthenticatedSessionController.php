<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\AnswerDisc;
use App\Models\Answerpsikotes;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (auth()->user()->role_id === 1) {
            return redirect()->intended(RouteServiceProvider::ADMINPANEL);
        } else {

            $psikotes   = Answerpsikotes::where('user_id', auth()->user()->id)->count();
            $disc       = AnswerDisc::where('user_id', auth()->user()->id)->count();

            // echo $psikotes;
            if ($psikotes > 0 && $disc > 0) {

                Auth::logout();

                session()->invalidate();
                session()->regenerateToken();

                return redirect('/')->with('success', 'Anda sudah mengikuti TES');
            } else {
                return redirect()->intended(RouteServiceProvider::USERPANEL);
            }
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}