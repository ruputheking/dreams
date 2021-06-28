<?php

namespace App\Http\Controllers\Backend\Notice;

use App\Models\Notice;
use App\Models\UserNotice;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::orderBy("notices.id", 'desc')->get();
        return view('backend.notices.notice-list', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if( ! $request->ajax()){
		   return view('backend.notices.notice-add');
		}else{
           return view('backend.notices.modal.notice-add');
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
            'heading' => 'required',
			'slug' => 'required|unique:notices',
            'summary' => 'required|string',
            'details' => 'required|string',
            'seo_meta_keywords' => 'nullable|string',
            'seo_meta_description' => 'nullable|string',
            'user_type' => 'required',
        ]);

        $notice= new Notice();
        $notice->title = $request->input('heading');
        $notice->slug = $request->input('slug');
        $notice->summary = $request->input('summary');
        $notice->details = $request->input('details');
        $notice->seo_meta_keywords = $request->input('seo_meta_keywords');
        $notice->seo_meta_description = $request->input('seo_meta_description');
        $notice->save();

        foreach ($request->user_type as $user_type) {
            $userNotice = new UserNotice();
			$userNotice->notice_id = $notice->id;
            $userNotice->user_type = $user_type;
			$userNotice->save();
        }

		if(! $request->ajax()){
           return redirect()->route('notices.index')->with('success', 'Information has been added sucessfully');
        }else{
		   return response()->json(['result'=>'success','action'=>'store','message'=> 'Information has been added sucessfully','data'=>$notice]);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Notice $notice)
    {
        $id = $notice->id;

		if(! $request->ajax()){
		    return view('backend.notices.notice-view', compact('notice','id'));
		}else{
			return view('backend.notice.modal.view', compact('notice','id'));
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        return view('backend.notices.notice-edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        $this->validate($request, [
            'heading' => 'required',
			'slug' => ['required', Rule::unique('notices')->ignore($notice->id)],
            'summary' => 'required|string',
            'details' => 'required|string',
            'seo_meta_keywords' => 'nullable|string',
            'seo_meta_description' => 'nullable|string',
            'user_type' => 'required',
        ]);

        $notice->title = $request->input('heading');
        $notice->slug = $request->input('slug');
        $notice->summary = $request->input('summary');
        $notice->details = $request->input('details');
        $notice->seo_meta_keywords = $request->input('seo_meta_keywords');
        $notice->seo_meta_description = $request->input('seo_meta_description');
        $notice->update();

		$userNotice = UserNotice::where("notice_id", $notice->id);
		$userNotice->delete();

		foreach($request->input('user_type') as $user_type){
			$userNotice = new UserNotice();
			$userNotice->notice_id = $notice->id;
            $userNotice->user_type = $user_type;
			$userNotice->save();
		}

		if(! $request->ajax()){
           return redirect()->route('notices.index')->with('success', 'Information has been updated sucessfully');
        }else{
		   return response()->json(['result'=>'success','action'=>'update', 'message'=>'Information has been updated sucessfully','data'=>$notice]);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();
		$userNotice = UserNotice::where("notice_id", $notice->id)->delete();

        return redirect()->route('notices.index')->with('success', 'Information has been deleted sucessfully');
    }
}
