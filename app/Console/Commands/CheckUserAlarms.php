<?php

namespace App\Console\Commands;

use App\Models\Appointment;
use App\Models\Medicine;
use App\Notifications\AlarmNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class CheckUserAlarms extends Command
{

    protected $signature = 'app:check-user-alarms';


    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get the current time
        $now = Carbon::now();

        // Find the logged-in user
        $user = Auth::user();

        // Exit if no user is logged in
        if (!$user) {
            return;
        }

        // Check user's medicines
        $medicines = Medicine::where('user_id', $user->id)
            ->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->get();

        foreach ($medicines as $medicine) {
            $isReminderTime = false;

            if ($medicine->frequency === 'daily') {
                $isReminderTime = $now->isBetween($medicine->start_date, $medicine->end_date) &&
                    $now->format('H:i') === $medicine->time;
            } elseif ($medicine->frequency === 'weekly') {
                $isReminderTime = $now->isBetween($medicine->start_date, $medicine->end_date) &&
                    $now->format('H:i') === $medicine->time &&
                    $now->isSameDayOfWeek($medicine->start_date);
            }

            if ($isReminderTime) {
                $this->triggerAlarm($medicine, $user);
            }
        }

        // Check user's appointments
        $appointments = Appointment::where('user_id', $user->id)
            ->whereDate('appointment_date', $now->toDateString())
            ->whereTime('appointment_time', $now->format('H:i'))
            ->get();

        foreach ($appointments as $appointment) {
            $this->triggerAlarm($appointment, $user);
        }
    }

    private function triggerAlarm($item, $user)
    {
        // Code to trigger the alarm notification for the logged-in user
        // For example, sending a browser notification or alert
        $user->notify(new AlarmNotification($item));
    }
}
