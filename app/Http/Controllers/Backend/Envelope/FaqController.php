<?php

namespace App\Http\Controllers\Backend\Envelope;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('id', 'desc')->get();
        return view('backend.envelopes.faqs.faq-index', compact('faqs'));
    }

    public function show(Request $request, $id)
    {
        $faq = Faq::find($id);
        if (!$request->ajax()) {
            return view('backend.envelopes.faqs.faq-view', compact('faq'));
        }else {
            return view('backend.envelopes.faqs.modal.faq-view', compact('faq'));
        }
    }

    public function reply(Request $request, $id)
    {
        $faq = Faq::find($id);
        if (!$request->ajax()) {
            return view('backend.envelopes.faqs.faq-reply', compact('faq'));
        }else {
            return view('backend.envelopes.faqs.modal.faq-reply', compact('faq'));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'answer' => 'required|string'
        ]);

        $faq = Faq::find($id);
        $faq->answer = $request->answer;
        $faq->status = $request->status;
        $faq->update();

        return redirect()->route('faqs.index')->with('success', 'Information has been updated');
    }

    public function delete($id)
    {
        $faq = Faq::find($id);
        $faq->delete();

        return redirect()->route('faqs.index')->with('success', 'Information has been deleted');
    }
}
