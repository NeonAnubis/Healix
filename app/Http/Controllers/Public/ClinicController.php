<?php

namespace App\Http\Controllers\Public;

use App\Data\MockData;
use App\Http\Controllers\Controller;

class ClinicController extends Controller
{
    public function index()
    {
        return view('public.clinics', [
            'clinics' => MockData::clinics(),
        ]);
    }

    public function show(string $slug)
    {
        $clinic = collect(MockData::clinics())->firstWhere('slug', $slug);

        if (!$clinic) {
            abort(404);
        }

        $doctors = collect(MockData::doctors())->take(3);

        return view('public.clinic-profile', [
            'clinic' => $clinic,
            'doctors' => $doctors,
        ]);
    }
}
