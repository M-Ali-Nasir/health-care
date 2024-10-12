<?php

namespace App\Http\Controllers;

use App\Models\SeizureRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeizureRedocrdController extends Controller
{
    //store Seizure Records

    public function storeSeizureRecord(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'duration' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        SeizureRecord::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'time' => $request->time,
            'duration' => $request->duration,
            'description' => $request->description,
        ]);

        return redirect()->route('seizure-record-history')->with('success', 'Seizure record saved successfully.');
    }
}
