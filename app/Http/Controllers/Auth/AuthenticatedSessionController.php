<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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

        if (Auth::user()->hasRole(['de-was','dirut','dirtek','dirpel','agus'])) {
            return redirect()->to('/perumdam');
        }
        if (Auth::user()->hasRole(['adminUtama'])) {
            return redirect()->to('/perencanaanPenelitian');
        }

        if (Auth::user()->hasRole(['adminUmum'])) {
            return redirect()->to('/umkes');
        }

        if (Auth::user()->hasRole(['adminTeknik'])) {
            return redirect()->to('/produksi');
        }

        if (Auth::user()->hasRole(['adminLayan'])) {
            return redirect()->to('/evPel');
        }

        if (Auth::user()->hasRole(['spi'])) {
            return redirect()->to('/evkin');
        }

        if (Auth::user()->hasRole(['ipa'])) {
            return redirect()->to('/ipa');
        }
        if (Auth::user()->hasRole(['gudang'])) {
            return redirect()->to('/gudang');
        }

        return redirect()->intended(RouteServiceProvider::HOME);
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
