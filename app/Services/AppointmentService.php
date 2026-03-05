<?php

namespace App\Services;

use App\Enums\AppointmentStatus;

class AppointmentService
{
    public function getAvailableSlots(int $doctorId, string $date): array
    {
        // Mock available time slots
        $slots = [];
        $startHour = 9;
        $endHour = 17;

        for ($hour = $startHour; $hour < $endHour; $hour++) {
            foreach (['00', '30'] as $minute) {
                $time = sprintf('%02d:%s', $hour, $minute);
                $slots[] = [
                    'time' => $time,
                    'available' => rand(0, 1) === 1,
                    'formatted' => date('g:i A', strtotime($time)),
                ];
            }
        }

        return $slots;
    }

    public function book(array $data): array
    {
        // Mock booking response
        return [
            'id' => rand(10000, 99999),
            'doctor_id' => $data['doctor_id'],
            'patient_name' => $data['patient_name'] ?? 'Mock Patient',
            'date' => $data['date'],
            'time' => $data['time'],
            'status' => AppointmentStatus::Confirmed->value,
            'confirmation_code' => strtoupper(substr(md5(rand()), 0, 8)),
            'created_at' => now()->toISOString(),
        ];
    }

    public function cancel(int $appointmentId): bool
    {
        return true;
    }
}
