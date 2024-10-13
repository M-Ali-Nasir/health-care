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

    //delete seizure record
    public function deleteSeizureRecord($id)
    {
        $seizureRecord = SeizureRecord::findOrFail($id);
        $seizureRecord->delete();

        return redirect()->back()->with('success', 'Seizure record deleted successfully.');
    }


    //update seizure record
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'duration' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $seizureRecord = SeizureRecord::findOrFail($id);
        $seizureRecord->update([
            'date' => $request->date,
            'time' => $request->time,
            'duration' => $request->duration,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Seizure record updated successfully.');
    }
}
