<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAccountController extends Controller
{
    public function myAccountDashboard()
    {
        return view('frontend.customer.myAccount.myAccount');
    }

    public function myAccountAddress()
    {
        return view('frontend.customer.myAccount.myAccountAddress');
    }

    public function myAccountEdit()
    {
        return view('frontend.customer.myAccount.myAccountEdit');
    }

    public function myAccountOrders()
    {
        $userId = Auth::id();

        $orders = Order::latest()->where('user_id', $userId)->get();

        return view('frontend.customer.myAccount.myAccountOrders', compact('orders'));
    }

    public function myAccountOrderView(int $orderId)
    {
        $order = Order::with(['user', 'orderItems', 'orderItems.product'])->latest()->where('id', $orderId)->first();

        return view('frontend.customer.myAccount.myAccountOrdersDetails', compact('order'));
    }

    public function myAccountWishlist()
    {
        return view('frontend.customer.myAccount.myAccountWishlist');
    }
}
