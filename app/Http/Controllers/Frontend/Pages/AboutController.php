<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('frontend.pages.page-about');
    }

    public function introduction()
    {
        return view('frontend.pages.page-introduction');
    }

    public function director()
    {
        return view('frontend.pages.page-director');
    }

    public function objective()
    {
        return view('frontend.pages.page-objective');
    }

    public function team()
    {
        return view('frontend.pages.page-team');
    }

    public function facility()
    {
        return view('frontend.pages.page-facility');
    }

    public function placement()
    {
        return view('frontend.pages.page-placement');
    }
}
