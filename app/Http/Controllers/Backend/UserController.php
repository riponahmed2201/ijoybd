<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users  = User::where('role', '=', 'admin')->latest()->paginate(10);

        return view('backend.users.index', compact('users'));
    }
}
