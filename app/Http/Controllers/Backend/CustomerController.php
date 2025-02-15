<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers  = User::where('role', '=', 'customer')->latest()->paginate(10);

        return view('backend.customer.index', compact('customers'));
    }
}
