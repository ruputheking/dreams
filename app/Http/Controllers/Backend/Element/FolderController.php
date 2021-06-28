<?php

namespace App\Http\Controllers\Backend\Element;

use App\Models\Gallery;
use App\Models\Folder;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $folders = Folder::with('images')->orderBy('id', 'desc')->get();
        return view("backend.folders.folder-add", compact('folders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'title' => 'required|unique:folders|max:255',
          'slug' => 'required|unique:folders'
        ]);

        $folder = new Folder;
        $folder->title = $request->title;
        $folder->slug = $request->slug;
        $folder->save();

        return redirect()->back()->with("success", 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Folder $folder)
    {
        $folders = Folder::with('images')->orderBy('id', 'desc')->get();
        return view("backend.folders.folder-edit", compact('folder', 'folders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Folder $folder)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'slug' => ['required', Rule::unique('folders')->ignore($folder->id)],
        ]);
        $folder = Folder::findOrFail($id);
        $folder->title = $request->title;
        $folder->slug = $request->slug;
        $folder->update();

        return redirect()->route('folders.index')->with("success", 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Folder $folder)
    {
        if ($folder->id == 1) {
            return redirect()->route('folders.index')->with('error', "Sorry it's default folder.");
        }
        Gallery::where('folder_id', $id)->update(['folder_id' => 1]);
        Folder::findOrFail($id)->delete();

        return redirect()->route('folders.index')->with('success', 'Information has been deleted');
    }
}
