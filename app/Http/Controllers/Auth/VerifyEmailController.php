<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
  /**
   * Mark the authenticated user's email address as verified.
   */
  public function __invoke(EmailVerificationRequest $request): RedirectResponse
  {
    if ($request->user()->hasVerifiedEmail()) {
      if (Auth::user()->role === 'admin') {
        return redirect()->intended(route('admin.dashboard', absolute: false) . '?verified=1');
      } else {
        return redirect()->intended(route('employee.dashboard', absolute: false) . '?verified=1');
      }
    }

    if ($request->user()->markEmailAsVerified()) {
      event(new Verified($request->user()));
    }

    if (Auth::user()->role === 'admin') {
      return redirect()->intended(route('admin.dashboard', absolute: false) . '?verified=1');
    } else {
      return redirect()->intended(route('employee.dashboard', absolute: false) . '?verified=1');
    }
  }
}
