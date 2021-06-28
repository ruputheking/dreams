<?php

namespace App\Http\Controllers\Backend\Transaction;

use App\Models\InvoicePayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function index()
    {
        $transactions = InvoicePayment::select('*', 'invoice_payments.id as id', 'invoice_payments.status as status')
                                    ->join('invoices', 'invoices.id', '=', 'invoice_payments.invoice_id')
                                    ->join('students', 'students.id', '=', 'invoices.student_id')
                                    ->join('users', 'users.id', '=', 'invoice_payments.user_id')
                                    ->orderBy('invoice_payments.id', 'desc')->get();
                                
        return view('backend.transactions.requests.request-index', compact('transactions'));
    }

    public function edit(Request $request, $id)
    {
        $transaction = InvoicePayment::find($id);
        if (!$request->ajax()) {
            return view('backend.transactions.requests.request-edit', compact('transaction'));
        }else {
            return view('backend.transactions.requests.modal.request-edit', compact('transaction'));
        }
    }

    public function update(Request $request, $id)
    {
        $transaction = InvoicePayment::find($id);
        $transaction->status = $request->status;
        $transaction->update();

        return redirect()->route('transaction_requests.index')->with('success', 'Information has been updated');
    }

    public function delete($id)
    {
        $transaction = InvoicePayment::find($id);
        $transaction->delete();

        return redirect()->route('transaction_requests.index')->with('success', 'Information has been deleted');
    }
}
