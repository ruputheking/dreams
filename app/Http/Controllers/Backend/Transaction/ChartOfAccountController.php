<?php

namespace App\Http\Controllers\Backend\Transaction;

use Validator;
use App\Models\ChartOfAccount;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ChartOfAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chartofaccounts = ChartOfAccount::all()->sortByDesc("id");
        return view('backend.accounting.chart_of_account.list',compact('chartofaccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		if( ! $request->ajax()){
		   return view('backend.accounting.chart_of_account.create');
		}else{
           return view('backend.accounting.chart_of_account.modal.create');
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

		$validator = Validator::make($request->all(), [
			'name' => 'required|max:191',
			'type' => 'required|max:10'
		]);

		if ($validator->fails()) {
			if($request->ajax()){
			    return response()->json(['result'=>'error','message'=>$validator->errors()->all()]);
			}else{
				return redirect('dashboard/chart_of_accounts/create')
							->withErrors($validator)
							->withInput();
			}
		}


        $chartofaccount= new ChartOfAccount();
	    $chartofaccount->name = $request->input('name');
		$chartofaccount->type = $request->input('type');

        $chartofaccount->save();

		if(! $request->ajax()){
           return redirect('dashboard/chart_of_accounts/create')->with('success', 'Information has been added sucessfully');
        }else{
		   return response()->json(['result'=>'success','action'=>'store','message'=>'Information has been added sucessfully','data'=>$chartofaccount]);
		}

   }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $chartofaccount = ChartOfAccount::find($id);
		if(! $request->ajax()){
		    return view('backend.accounting.chart_of_account.view',compact('chartofaccount','id'));
		}else{
			return view('backend.accounting.chart_of_account.modal.view',compact('chartofaccount','id'));
		}

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $chartofaccount = ChartOfAccount::find($id);
		if(! $request->ajax()){
		   return view('backend.accounting.chart_of_account.edit',compact('chartofaccount','id'));
		}else{
           return view('backend.accounting.chart_of_account.modal.edit',compact('chartofaccount','id'));
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

		$validator = Validator::make($request->all(), [
			'name' => 'required|max:191',
			'type' => 'required|max:10'
		]);

		if ($validator->fails()) {
			if($request->ajax()){
			    return response()->json(['result'=>'error','message'=>$validator->errors()->all()]);
			}else{
				return redirect()->route('chart_of_accounts.edit', $id)
							->withErrors($validator)
							->withInput();
			}
		}



        $chartofaccount = ChartOfAccount::find($id);
		$chartofaccount->name = $request->input('name');
		$chartofaccount->type = $request->input('type');

        $chartofaccount->save();

		if(! $request->ajax()){
           return redirect('dashboard/chart_of_accounts')->with('success', 'Information has been updated sucessfully');
        }else{
		   return response()->json(['result'=>'success','action'=>'update', 'message'=>'Information has been updated sucessfully','data'=>$chartofaccount]);
		}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chartofaccount = ChartOfAccount::find($id);
        $chartofaccount->delete();
        return redirect('dashboard/chart_of_accounts')->with('success', 'Information has been deleted sucessfully');
    }
}
