<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('id', 'desc')->get();
        return view('frontend.galleries.page-gallery', compact('galleries'));
    }
}
