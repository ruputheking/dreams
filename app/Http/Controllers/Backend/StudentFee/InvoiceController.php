<?php

namespace App\Http\Controllers\Backend\StudentFee;

use Validator;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\StudentPayment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($class="")
    {
		$invoices = array();
		if( $class !="" ){
			$invoices = Invoice::join('students','invoices.student_id','=','students.id')
								->join('student_sessions','students.id','=','student_sessions.student_id')
								->join('courses','courses.id','=','student_sessions.course_id')
								->join('sections','sections.id','=','student_sessions.section_id')
								->select('invoices.*','students.student_name','courses.title','sections.section_name','invoices.id as id')
								->where('student_sessions.session_id',get_option('academic_years'))
								->where('invoices.session_id',get_option('academic_years'))
								->where('invoices.class_id',$class)
								->orderBy('invoices.id', 'DESC')
								->get();
		}
        return view('backend.invoice.list',compact('invoices','class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		if( ! $request->ajax()){
		   return view('backend.invoice.create');
		}else{
           return view('backend.invoice.modal.create');
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
		@ini_set('max_execution_time', 0);
		@set_time_limit(0);

		$validator = Validator::make($request->all(), [
			'student_id' => 'required',
			'course_id' => 'required',
			'section_id' => 'required',
			'due_date' => 'required',
			'title' => 'required|max:191',
			'total' => 'required|numeric',
			'status' => 'required'
		]);

		if ($validator->fails()) {
			if($request->ajax()){
			    return response()->json(['result'=>'error','message'=>$validator->errors()->all()]);
			}else{
				return redirect('dashboard/invoices/create')
							->withErrors($validator)
							->withInput();
			}
		}

        if($request->input('student_id') == "all"){
			foreach($request->input('students') as $student_id){
				$invoice= new Invoice();
				$invoice->student_id = $student_id;
				$invoice->class_id = $request->input('course_id');
				$invoice->section_id = $request->input('section_id');
				$invoice->session_id = get_option('academic_years');
				$invoice->due_date = $request->input('due_date');
				$invoice->title = $request->input('title');
				$invoice->description = $request->input('description');
				$invoice->total = $request->input('total');
				$invoice->status = $request->input('status');

				$invoice->save();

				//Store Invoice Item
				$counter = 0;
				foreach($request->input("fee_type") as $fee_id){
					if($request->input("amount")[$counter] == 0 && $fee_id==""){
						continue;
					}
					$invoiceItem = new InvoiceItem();
					$invoiceItem->invoice_id = $invoice->id;
					$invoiceItem->fee_id = $fee_id;
					$invoiceItem->amount = $request->input("amount")[$counter];
					$invoiceItem->discount = $request->input("discount")[$counter];
				    $invoiceItem->save();

					$counter++;
				}
			}
		}else{
			//Store Single Student Invoice
			$invoice= new Invoice();
			$invoice->student_id = $request->input('student_id');
			$invoice->class_id = $request->input('course_id');
			$invoice->section_id = $request->input('section_id');
			$invoice->session_id = get_option('academic_years');
			$invoice->due_date = $request->input('due_date');
			$invoice->title = $request->input('title');
			$invoice->description = $request->input('description');
			$invoice->total = $request->input('total');
			$invoice->status = $request->input('status');

			$invoice->save();

			//Store Invoice Item
			$counter = 0;
			foreach($request->input("fee_type") as $fee_id){
				if($request->input("amount")[$counter] == 0){
					continue;
				}
				$invoiceItem = new InvoiceItem();
				$invoiceItem->invoice_id = $invoice->id;
				$invoiceItem->fee_id = $fee_id;
				$invoiceItem->amount = $request->input("amount")[$counter];
				$invoiceItem->discount = $request->input("discount")[$counter];
				$invoiceItem->save();

				$counter++;
			}
		}

		if(! $request->ajax()){
           return redirect('dashboard/invoices/create')->with('success', 'Invoice Created sucessfully');
        }else{
		   return response()->json(['result'=>'success','action'=>'store','message'=>'Invoice Created sucessfully','data'=>$invoice]);
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
		$invoice = Invoice::join('students','invoices.student_id','=','students.id')
							->join('student_sessions','students.id','=','student_sessions.student_id')
                            ->join('courses','courses.id','=','student_sessions.course_id')
                            ->join('sections','sections.id','=','student_sessions.section_id')
							->select('invoices.*','students.student_name','courses.title','sections.section_name','invoices.id as id')
							->where('student_sessions.session_id',get_option('academic_years'))
							->where('invoices.session_id',get_option('academic_years'))
							->where('invoices.id',$id)->first();
		$invoiceItems = InvoiceItem::join("fee_types","invoice_items.fee_id","=","fee_types.id")
		                ->where("invoice_id",$id)->get();

		$transactions = StudentPayment::where("invoice_id",$id)->get();

		if(! $request->ajax()){
		    return view('backend.invoice.view',compact('invoice','id','invoiceItems','transactions'));
		}else{
			return view('backend.invoice.modal.view',compact('invoice','id','invoiceItems','transactions'));
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
        $invoice = Invoice::where("id",$id)
				   ->where("session_id",get_option('academic_years'))->first();
        if(empty($invoice)){
			abort(404);
		}
		$invoiceItems = InvoiceItem::where("invoice_id",$id)->get();
		if(! $request->ajax()){
		   return view('backend.invoice.edit',compact('invoice','id','invoiceItems'));
		}else{
           return view('backend.invoice.modal.edit',compact('invoice','id','invoiceItems'));
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
	    @ini_set('max_execution_time', 0);
		@set_time_limit(0);

		$validator = Validator::make($request->all(), [
			'student_id' => 'required',
			'course_id' => 'required',
			'section_id' => 'required',
			'due_date' => 'required',
			'title' => 'required|max:191',
			'total' => 'required|numeric',
			'status' => 'required'
		]);

		if ($validator->fails()) {
			if($request->ajax()){
			    return response()->json(['result'=>'error','message'=>$validator->errors()->all()]);
			}else{
				return redirect()->route('invoices.edit', $id)
							->withErrors($validator)
							->withInput();
			}
		}


		//Store Single Student Invoice
		$invoice= Invoice::find($id);
		$invoice->student_id = $request->input('student_id');
		$invoice->class_id = $request->input('course_id');
		$invoice->section_id = $request->input('section_id');
		$invoice->due_date = $request->input('due_date');
		$invoice->title = $request->input('title');
		$invoice->description = $request->input('description');
		$invoice->total = $request->input('total');
		$invoice->status = $request->input('status');

		$invoice->save();

		//Remove All Items
		$invoiceItem = InvoiceItem::where("invoice_id",$id);
		$invoiceItem->delete();

		//Store Invoice Item
		$counter = 0;
		foreach($request->input("fee_type") as $fee_id){
			if($request->input("amount")[$counter] == 0){
				continue;
			}
			$invoiceItem = new InvoiceItem();
			$invoiceItem->invoice_id = $invoice->id;
			$invoiceItem->fee_id = $fee_id;
			$invoiceItem->amount = $request->input("amount")[$counter];
			$invoiceItem->discount = $request->input("discount")[$counter];
			$invoiceItem->save();

			$counter++;
		}


		if(! $request->ajax()){
           return redirect('dashboard/invoices')->with('success', 'Invoice updated sucessfully');
        }else{
		   return response()->json(['result'=>'success','action'=>'update', 'message'=>'Invoice updated sucessfully','data'=>$invoice]);
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
        $invoice = Invoice::find($id);
        $invoice->delete();

		$invoiceItem = InvoiceItem::where("invoice_id",$id);
		$invoiceItem->delete();

        return redirect('dashboard/invoices')->with('success', 'Invoice Removed sucessfully');
    }
}
