<?php

namespace App\Http\Controllers\Backend\Notification;

use DB;
use App\Models\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailFromDreamsAcademyOfProfessionalStudies;

class EmailController extends Controller
{
    public function index()
    {
        return view('backend.emails.email-send');
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'subject' => 'string|required|max:255',
            'details' => 'required|string'
        ]);

        $data = array(
            'subject' => $request->subject,
            'details' => $request->details
        );

        Mail::to($request->email)->send(new MailFromDreamsAcademyOfProfessionalStudies($data));

        $email = new Email;
        $email->email = $request->email;
        $email->subject = $request->subject;
        $email->details = $request->details;
        $email->save();

        return redirect()->route('email.index')->with('success', 'Email has been send');
    }

    public function detail()
    {
        return view('backend.emails.email-detail');
    }

    public function setting(Request $request)
    {
        $this->validate($request, [
            'from_name' => 'string|required|max:255',
            'from_email' => 'string|required|max:255',
        ]);

        DB::table('settings')->where('settings.name', '=', 'from_name')->update(['settings.value' => $request->from_name]);
        DB::table('settings')->where('settings.name', '=', 'from_email')->update(['settings.value' => $request->from_email]);

        return redirect()->route('email.detail')->with('success', 'Information has been changed');
    }

    public function history()
    {
        $emails = Email::orderBy('id', 'desc')->get();

        return view('backend.emails.email-history', compact('emails'));
    }

    public function delete($id)
    {
        Email::findOrFail($id)->delete();

        return redirect()->route('email.history')->with('Information has been deleted');
    }
}
