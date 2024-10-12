<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    //store the user appointment
    public function store(Request $request)
    {
        $request->validate([
            'doctor_name' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
        ]);

        Appointment::create([
            'user_id' => Auth::id(),
            'doctor_name' => $request->input('doctor_name'),
            'appointment_date' => $request->input('appointment_date'),
            'appointment_time' => $request->input('appointment_time'),
        ]);

        return redirect()->route('appointment-alert-history')->with('success', 'Appointment created successfully.');
    }

    //Delete appointment
    public function deleteAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->back()->with('success', 'Appointment deleted successfully.');
    }
}
