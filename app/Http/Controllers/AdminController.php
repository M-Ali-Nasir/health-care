<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Medicine;
use App\Models\SeizureRecord;
use App\Models\Story;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //dashboard page
    public function dashboardView()
    {
        $user = Auth::user();
        return view('admin.dashboard', compact('user'));
    }

    //All users page
    public function allUserView()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.allUsers', compact('users'));
    }

    //active users Page
    public function activeUserView()
    {
        $users = User::where('role', 'user')->where('status', 'active')->get();
        return view('admin.allUsers', compact('users'));
    }

    //deactivated users page
    public function deactivatedUserView()
    {
        $users = User::where('role', 'user')->where('status', 'deactivated')->get();
        return view('admin.allUsers', compact('users'));
    }

    //appointment page
    public function appointmentView()
    {
        $appointments = Appointment::with('user')->get();
        return view('admin.appointments', compact('appointments'));
    }

    //medicine page
    public function medicineView()
    {
        $medicines = Medicine::with('user')->get();
        return view('admin.medicines', compact('medicines'));
    }

    //seizure page
    public function seizureView()
    {
        $seizures = SeizureRecord::with('user')->get();
        return view('admin.seizures', compact('seizures'));
    }

    //stories page
    public function storiesView()
    {
        $stories = Story::with('user')->get();
        return view('admin.stories', compact('stories'));
    }
}
