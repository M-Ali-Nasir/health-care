<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicineController extends Controller
{
    //store the medicine alert record
    public function store(Request $request)
    {
        $request->validate([
            'medication_type' => 'required|string|max:255',
            'medicine_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'alarm_time' => 'required|date_format:H:i',
            'alarm_frequency' => 'required|in:daily,weekly',
        ]);

        Medicine::create([
            'user_id' => Auth::id(),
            'medication_type' => $request->medication_type,
            'medicine_name' => $request->medicine_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'alarm_time' => $request->alarm_time,
            'alarm_frequency' => $request->alarm_frequency,
        ]);

        return redirect()->route('medicine-alarm-history')->with('success', 'Medicine alert created successfully');
    }
}
