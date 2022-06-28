<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        return view('front.home');
    }

    public function login() {
        return view('front.login');
    }

    public function signup() {
        return view('front.signup');
    }

    public function dashboard() {
        return view('front.dashboard');
    }

    public function aboutUs() {
        return view('front.about_us');
    }

    public function contactUs() {
        return view('front.contact_us');
    }

    public function cart() {
        return view('front.cart');
    }

    public function checkout() {
        return view('front.checkout');
    }

    public function confirmation() {
        return view('front.confirmation');
    }

    public function shop() {
        return view('front.shop');
    }

    public function productDetail() {
        return view('front.product_detail');
    }

    public function faq() {
        return view('front.faq');
    }
}
