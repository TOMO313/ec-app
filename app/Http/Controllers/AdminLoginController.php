<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminLoginController extends Controller
{
    public function create(): View
    {
        return view('admin.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->adminAuthenticate();

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }
}
