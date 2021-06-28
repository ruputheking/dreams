<?php

namespace App\Http\Controllers\Frontend\Form;

use App\Models\User;
use App\Models\Notification;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function appointment(Request $request)
    {
        if ($request->ajax()) {
            return view('frontend.ajax-load.form-appointment');
        }else {
            return view('frontend.appointments.appointment-form');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'form_name' => 'required',
            'form_email' => 'required|email',
            'form_phone' => 'required',
            'form_appontment_date' => 'required',
            'form_message' => 'required|string'
        ]);
        $appointment = new Appointment;
        $appointment->name = $request->form_name;
        $appointment->email = $request->form_email;
        $appointment->phone = $request->form_phone;
        $appointment->message = $request->form_message;
        $appointment->date = $request->form_appontment_date;
        $appointment->save();

        $users = User::select('*','users.id AS id')->join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_user.role_id', 1)->get();
        foreach ($users as $data) {
            $notification = new Notification;
            $notification->user_id = $data->id;
            $notification->title = 'You have appointment request.';
            $notification->message = $request->form_name . "has been sent you a request for appointment";
            $notification->address = route('appointments.index');
            $notification->save();
        }

        return redirect()->back()->with('success', 'Information has been added');
    }
}
