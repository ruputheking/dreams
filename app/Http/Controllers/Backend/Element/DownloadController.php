<?php

namespace App\Http\Controllers\Backend\Element;

use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $downloads = Download::orderBy('id', 'desc')->get();
        return view('backend.elements.downloads.download-index', compact('downloads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (! $request->ajax()) {
            return view('backend.elements.downloads.download-create');
        }else {
            return view('backend.elements.downloads.modal.download-create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'document_name' => 'required|string',
            'document_file' => 'required'
        ]);

        $download = new Download;
        $download->document_name = $request->document_name;
        if ($request->hasFile('document_file')) {
            $image = $request->file('document_file');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/downloads/', $fileName);
            $download->document_file = 'downloads/' . $fileName;
        }
        $download->save();

        return redirect()->route('downloads.index')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $download = Download::find($id);
        if (!$request->ajax()) {
            return view('backend.elements.downloads.download-view', compact('download'));
        }else {
            return view('backend.elements.downloads.modal.download-view', compact('download'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $download = Download::find($id);
        if (! $request->ajax()) {
            return view('backend.elements.downloads.download-edit', compact('download'));
        }else {
            return view('backend.elements.downloads.modal.download-edit', compact('download'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'document_name' => 'required|string',
            'document_file' => 'required'
        ]);

        $download = Download::find($id);
        $download->document_name = $request->document_name;
        if ($request->hasFile('document_file')) {
            $image = $request->file('document_file');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/images/downloads/', $fileName);
            $download->document_file = 'downloads/' . $fileName;
        }
        $download->update();

        return redirect()->route('downloads.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $download = Download::find($id);
        $download->delete();
        return redirect()->route('downloads.index')->with('success', 'Information has been deleted');
    }
}
