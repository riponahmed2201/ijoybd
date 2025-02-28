<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('frontend.customer.myAccount.myAccountOrders');
    }

    public function myAccountWishlist()
    {
        return view('frontend.customer.myAccount.myAccountWishlist');
    }
}
