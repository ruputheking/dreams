<?php

namespace App\Http\Controllers\Backend\Appointment;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::orderBy('id', 'desc')->get();
        return view('backend.appointments.appointment-index', compact('appointments'));
    }

    public function show(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        if (!$request->ajax()) {
            return view('backend.appointments.appointment-show', compact('appointment'));
        }else {
            return view('backend.appointments.modal.appointment-show', compact('appointment'));
        }
    }

    public function delete($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        return redirect()->route('appointments.index')->wiht('success', 'Information has been deleted');
    }
}
