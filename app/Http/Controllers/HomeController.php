<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('readStory');
    }

    //Write story Page
    public function writeStoryView()
    {
        return view('writeStory');
    }


    //User Profile Page
    public function userProfileView()
    {
        return view('userProfile');
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
        return view('appointmentAlertHistory');
    }


    //seizure Record History Page
    public function seizureRecordHistoryView()
    {
        return view('seizureRecordHistory');
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


    //medicine Alarm Set Page
    public function medicineAlarmSetView()
    {
        return view('medicineAlarmSet');
    }


    //medicine Alarm History Page
    public function medicineAlarmHistoryView()
    {
        return view('medicineAlarmHistory');
    }
}
