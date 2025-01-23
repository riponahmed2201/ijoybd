<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function showLoginForm(): View
    {
        return view('backend.auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        // Validate input
        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        try {
            // Attempt login using Laravel's built-in authentication
            if (Auth::attempt($validated, $request->boolean('remember'))) {
                // Regenerate session to prevent fixation attacks
                $request->session()->regenerate();

                // Redirect to the dashboard
                return redirect()->intended(route('admin.dashboard'))->with('success', 'Login successful');
            }

            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        } catch (Exception $exception) {
            // Log the exception and show a generic error message
            logger()->error('Login error: ' . $exception->getMessage());
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        // Log out the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token to prevent session fixation attacks
        $request->session()->regenerateToken();

        // Redirect to the login page or home page
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        try {
            $user = Auth::user();

            $hashedPassword = $user->password;

            if (Hash::check($request->current_password, $hashedPassword)) {
                if (!Hash::check($request->password, $hashedPassword)) {
                    $user->update([
                        'password' => Hash::make($request->password)
                    ]);
                    Auth::logout();
                    notify()->success('Password was changed successfully.', 'Success');
                    return redirect('/');
                } else {
                    notify()->warning('New password can not be same as old password.', 'Warning');
                }
            } else {
                notify()->error('Current password not match.', 'Error');
            }

            return back();
        } catch (Exception $exception) {
            Log::error("Password update failed", ['error' => $exception->getMessage()]);
            notify()->error("Something went wrong! Please try again.", "Error");
            return back();
        }
    }
}
