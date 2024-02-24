<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('user.index');
    }

    public function shop()
    {
        return view('user.pages.shop');
    }

    public function shopDetails()
    {
        return view('user.pages.shop-detail');
    }

    public function cart()
    {
        return view('user.pages.cart');
    }

    public function checkout()
    {
        return view('user.pages.checkout');
    }

    public function testimonial()
    {
        return view('user.pages.testimonial');
    }

    public function notFound()
    {
        return view('user.pages.404');
    }

    public function contact()
    {
        return view('user.pages.contact');
    }

}
