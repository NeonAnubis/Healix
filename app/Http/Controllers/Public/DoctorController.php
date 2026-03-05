<?php

namespace App\Http\Controllers\Public;

use App\Data\MockData;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function index()
    {
        return view('public.doctors', [
            'doctors' => MockData::doctors(),
            'specialties' => MockData::specialties(),
        ]);
    }

    public function show(string $slug)
    {
        $doctor = collect(MockData::doctors())->firstWhere('slug', $slug);

        if (!$doctor) {
            abort(404);
        }

        return view('public.doctor-profile', [
            'doctor' => $doctor,
            'relatedDoctors' => collect(MockData::doctors())
                ->where('specialty', $doctor['specialty'])
                ->where('slug', '!=', $slug)
                ->take(3),
        ]);
    }
}
