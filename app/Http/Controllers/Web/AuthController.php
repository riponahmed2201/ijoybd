<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLoginForm(): View
    {
        return view('frontend.auth.login');
    }

    public function showRegisterForm(): View
    {
        return view('frontend.auth.register');
    }

    public function login(Request $request): RedirectResponse
    {
        // Validate input
        $validated = $request->validate([
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:6',
        ]);

        try {
            // Attempt login using Laravel's built-in authentication
            if (Auth::attempt($validated, $request->boolean('remember'))) {
                // Regenerate session to prevent fixation attacks
                $request->session()->regenerate();

                // Redirect to the dashboard
                return redirect()->intended(route('customer.dashboard'))->with('success', 'Login successful');
            }

            notify()->error("The provided credentials do not match our records.", "Error");
            return back()->withInput();
        } catch (Exception $exception) {
            notify()->error("Something went wrong! Please try again", "Error");
            return back()->withInput();
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15|unique:users,phone',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        try {
            User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'role' => 'customer',
                'password' => Hash::make($request->password),
            ]);

            notify()->success("User registered successfully!", "Success");

            return to_route('customer.login');
        } catch (Exception $exception) {
            notify()->error("Something went wrong! Please try again", "Error");
            return back()->withInput();
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
        notify()->success('You have been logged out successfully.', 'Success');
        return redirect('/login');
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
