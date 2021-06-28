<?php

namespace App\Http\Controllers\Pages;

use App\Models\Download;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::orderBy('id', 'desc')->get();
        return view('frontend.pages.page-download', compact('downloads'));
    }
}
