<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profiles.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'phone' => ['required', 'string', 'max:20', Rule::unique('users')->ignore(Auth::user()->id)],
        ]);

        $input = $request->only(['name', 'email', 'phone']);

        try {

            $user = $request->user();
            $user->fill($input);

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }

            $user->save();

            notify()->success("Profile updated successfully.", "Success");
            return back();
        } catch (Exception $exception) {
            Log::error("Profile update failed", ['error' => $exception->getMessage()]);
            notify()->error("Something went wrong! Please try again.", "Error");
            return back();
        }
    }
}
