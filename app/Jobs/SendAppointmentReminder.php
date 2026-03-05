<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SendAppointmentReminder implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly int $appointmentId,
        private readonly string $patientEmail,
        private readonly string $doctorName,
        private readonly string $appointmentTime,
    ) {}

    public function handle(): void
    {
        Log::info("Sending appointment reminder", [
            'appointment_id' => $this->appointmentId,
            'patient_email' => $this->patientEmail,
            'doctor' => $this->doctorName,
            'time' => $this->appointmentTime,
        ]);

        // In production: Mail::to($this->patientEmail)->send(new AppointmentReminderMail(...))
    }
}
