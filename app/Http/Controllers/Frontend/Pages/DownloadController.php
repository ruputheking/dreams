<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Models\Download;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::orderBy('id', 'desc')->paginate(6);
        return view('frontend.pages.page-download', compact('downloads'));
    }
}
