<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Models\Faq;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('status', 0)->orderBy('id', 'desc')->get();
        return view('frontend.faqs.faq-list', compact('faqs'));
    }

    public function create(Request $request)
    {
        if( ! $request->ajax()){
           return view('frontend.faqs.faq-add');
 		}else{
            return view('frontend.faqs.modal.create');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|numeric',
        ]);

        $faq = new Faq;
        $faq->question = $request->question;
        $faq->name = $request->name;
        $faq->email = $request->email;
        $faq->phone = $request->phone;
        $faq->save();

        $users = User::select('*','users.id AS id')->join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_user.role_id', 1)->get();
        foreach ($users as $data) {
            $notification = new Notification;
            $notification->user_id = $data->id;
            $notification->title = 'You have one question.';
            $notification->message = $request->name . "has been asked one question.";
            $notification->address = route('faqs.index');
            $notification->save();
        }

        return redirect()->route('pages.faq')->with('success', 'Successfully Asked.');
    }
}
