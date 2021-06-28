<?php

namespace App\Http\Controllers\Backend\Element;

use App\Models\Plugin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PluginsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plugins = Plugin::orderBy('id', 'desc')->get();
        return view('backend.plugins.plugin-list', compact('plugins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.plugins.plugin-add');
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
            'title' => 'required|string',
            'code' => 'required|string'
        ]);

        $plugin = new Plugin;
        $plugin->title = $request->title;
        $plugin->code = $request->code;
        $plugin->save();

        return redirect()->route('plugins.index')->with('success', 'Information has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plugin = Plugin::find($id);
        return view('backend.plugins.plugin-edit', compact('plugin'));
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
            'title' => 'required|string',
            'code' => 'required|string'
        ]);

        $plugin = Plugin::find($id);
        $plugin->title = $request->title;
        $plugin->code = $request->code;
        $plugin->update();

        return redirect()->route('plugins.index')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Plugin::find($id)->delete();
        return redirect()->route('plugins.index')->with('success', 'Information has been deleted');
    }
}
