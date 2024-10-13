<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Medicine;
use App\Models\Painting;
use App\Models\SeizureRecord;
use App\Models\Story;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    //Home page
    public function homeView()
    {
        return view('home');
    }

    //faqs page
    public function faqsView()
    {
        return view('faqs');
    }

    //Dr. Profile page
    public function drProfileView()
    {
        return view('drProfile');
    }

    //Privacy Policy Page
    public function privacyPolicyView()
    {
        return view('privacyPolicy');
    }

    //Auth Page
    public function authView()
    {
        return view('auth');
    }

    //Read story Page
    public function readStoryView()
    {
        $stories = Story::with('user')->get();
        return view('readStory', compact('stories'));
    }

    //Write story Page
    public function writeStoryView()
    {
        return view('writeStory');
    }


    //User Profile Page
    public function userProfileView()
    {
        $user = User::where('id', Auth::id())->with('appointment', 'medicine', 'story', 'seizureRecord', 'painting')->first();


        return view('userProfile', compact('user'));
    }


    //Educational resource Page
    public function educationalResourcesView()
    {
        return view('educationalRecources');
    }


    //Breathing Exercise Page
    public function breathingExerciseView()
    {
        return view('breathingExercise');
    }


    //Appointment Alert set Page
    public function appointmentAlertSetView()
    {
        return view('appointmentAlertSet');
    }


    //Appointment Alert History Page
    public function appointmentAlertHistoryView()
    {

        $appointments = Appointment::where('user_id', Auth::id())->get();
        return view('appointmentAlertHistory', compact('appointments'));
    }


    //seizure Record History Page
    public function seizureRecordHistoryView()
    {

        $records = SeizureRecord::where('user_id', Auth::id())->get();

        return view('seizureRecordHistory', compact('records'));
    }


    //seizure Record Form Page
    public function seizureRecordFormView()
    {
        return view('seizureRecordForm');
    }


    //self Diagnosis  Page
    public function selfDiagnosisView()
    {
        return view('selfDiagnosis');
    }


    //relaxation Art  Page
    public function relaxationArtView()
    {
        return view('relaxationArtHome');
    }


    //pait Now Page
    public function paitNowView()
    {
        return view('paintNow');
    }

    //save painting
    public function savePainting(Request $request)
    {
        try {

            if (!$request->has('image')) {
                return response()->json(['error' => 'No image data provided'], 400);
            }


            $data = $request->input('image');
            $image = str_replace('data:image/png;base64,', '', $data);
            $image = str_replace(' ', '+', $image);
            $imageName = Auth::id() . '_' . time() . '.png';


            $path = public_path('paintings/' . $imageName);


            if (!file_exists(public_path('paintings'))) {
                mkdir(public_path('paintings'), 0755, true);
            }


            if (file_put_contents($path, base64_decode($image)) === false) {
                return response()->json(['error' => 'Failed to save the image file.'], 500);
            }

            $painting = new Painting();
            $painting->user_id = Auth::id();
            $painting->image_path = 'paintings/' . $imageName;
            $painting->save();

            return response()->json(['success' => 'Painting saved successfully!']);
        } catch (\Exception $e) {
            Log::error('Save Painting Error: ' . $e->getMessage());
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }


    //medicine Alarm Set Page
    public function medicineAlarmSetView()
    {


        return view('medicineAlarmSet');
    }


    //medicine Alarm History Page
    public function medicineAlarmHistoryView()
    {
        $medicines = Medicine::where('user_id', Auth::id())->get();
        return view('medicineAlarmHistory', compact('medicines'));
    }



    //checking for alarm time

    public function checkAlarm()
    {

        if (Auth::user()) {


            $userId = Auth::id();

            $currentDate = Carbon::now()->toDateString();
            $currentTime = Carbon::now()->timezone('Asia/Karachi')->format('H:i');


            // Check for appointment alarm
            $appointment = Appointment::where('user_id', $userId)
                ->where('appointment_date', $currentDate)
                ->where('appointment_time', $currentTime)
                ->first();

            if ($appointment) {
                return response()->json([
                    'alarm' => true,
                    'message' => 'You have an appointment now.',
                ]);
            }

            // Check for medicine alarm
            $medicine = Medicine::where('user_id', $userId)
                ->where('start_date', '<=', $currentDate)
                ->where('end_date', '>=', $currentDate)
                ->where('alarm_time', $currentTime)
                ->where(function ($query) use ($currentDate) {
                    $query->where('alarm_frequency', 'daily')
                        ->orWhere(function ($query) use ($currentDate) {
                            $query->where('alarm_frequency', 'weekly')
                                ->whereRaw('WEEKDAY(start_date) = WEEKDAY(?)', [$currentDate]);
                        });
                })
                ->first();

            if ($medicine) {
                return response()->json([
                    'alarm' => true,
                    'message' => 'It is time to take your medicine.',
                ]);
            }

            return response()->json(['alarm' => false]);
        } else {
            return response()->json(['alarm' => false]);
        }
    }
}
