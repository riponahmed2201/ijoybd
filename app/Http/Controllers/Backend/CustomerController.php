<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers  = User::where('role', '=', 'customer')->latest()->paginate(10);

        return view('backend.customers.index', compact('customers'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            User::where('id', $id)->where('role', 'customer')->delete();
            return response()->json(['success' => true, 'message' => 'Customer deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete customer'], 500);
        }
    }
}
