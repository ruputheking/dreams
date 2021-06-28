<?php

namespace App\Http\Controllers\Backend\Element;

use App\Models\Gallery;
use App\Models\Folder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $folder = Folder::all();
        $photos = Gallery::orderBy('id', 'desc')->get();
        return view('backend.photos.photo-list', compact('photos', 'folder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Image $photo)
    {
        return view('backend.photos.photo-add', compact('photo'));
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
          'image' => 'required|image|mimes:jpeg,jpg,png',
          'image_name' => 'nullable|string|max:255',
          'folder_id' => 'required|numeric'
        ]);

        $data = $this->handleRequest($request);
        Gallery::create($data);
        return redirect()->back()->with('success', 'Image has been uploaded.');
    }

    private function handleRequest($request)
    {
        $data = $request->all();

        if ($request->hasFile('image'))
        {
            $folder = Folder::findOrFail($request->folder_id);
            $upload = 'frontend/images/gallery/'. $folder->folder;
            $image       = $request->file('image');
            $fileName    = $folder->folder . "/" . Str::uuid() . '.' . $image->getClientOriginalExtension();
            $destination = public_path($upload);

            $successUploaded = $image->move($destination, $fileName);

            $data['image'] = $fileName;
        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $folder)
    {
        return view('backend.photos.photo-show', compact('folder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Gallery::findOrFail($id);
        return view('backend.photos.photo-edit', compact('photo'));
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
          'image' => 'nullable|image|mimes:jpeg,jpg,png',
          'folder_id' => 'required|numeric'
        ]);

        $image = Gallery::findOrFail($id);
        $oldImage = $image->image;
        $data = $this->handleRequest($request);
        $image->update($data);

        if ($oldImage !== $image->image) {
          $this->removeImage($oldImage);
        }

        return redirect()->route('galleries.edit', $id)->with('success', 'Image has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Gallery::findOrFail($id);
        $photo->delete();
        $this->removeImage($photo->image);
        return redirect()->back()->with('success', 'Image has been deleted.');
    }

    private function removeImage($image)
    {
        if ( ! empty($image))
        {
          $imagePath = 'frontend/images/gallery' . '/' . $image;
          $ext = substr(strrchr($image, '.'), 1);

          if (file_exists($imagePath)) unlink($imagePath);
        }
    }
}
