<?php

namespace App\Http\Controllers\Backend\Utility;

use Validator;
use App\Models\Picklist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PicklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$type = "";
        $picklists = Picklist::orderBy("id", 'desc')->get();
        return view('backend.administration.picklist.list', compact('picklists','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('backend.administration.picklist.list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
			'value' => 'required'
		]);

        $picklist = new Picklist();
		$picklist->value = $request->input('value');
        $picklist->save();

        return redirect()->route('picklists.index')->with('success', 'Information has been added sucessfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $picklist = Picklist::find($id);
        $picklists = Picklist::orderBy("id", 'desc')->get();
        return view('backend.administration.picklist.edit', compact('picklist','picklists'));
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
        $validator = Validator::make($request->all(), [
    		'value' => 'required'
		]);

        $picklist = Picklist::find($id);
		$picklist->value = $request->input('value');
        $picklist->save();

        return redirect()->route('picklists.index')->with('success', 'Information has been updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $picklist = Picklist::find($id)->delete();

        return redirect()->route('picklists.index')->with('success', 'Information has been deleted sucessfully');
    }
}
