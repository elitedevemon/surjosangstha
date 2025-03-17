<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user()->hasVerifiedEmail()
                    ? (Auth::user()->role === 'admin' 
                    ? redirect()->intended(route('admin.dashboard', absolute: false)) 
                    : redirect()->intended(route('employee.dashboard', absolute: false)))
                    : view('auth.verify-email');
    }
}
