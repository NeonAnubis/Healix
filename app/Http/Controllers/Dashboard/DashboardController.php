<?php

namespace App\Http\Controllers\Dashboard;

use App\Data\MockData;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'stats' => MockData::dashboardStats(),
            'doctor' => MockData::doctors()[0],
        ]);
    }

    public function appointments()
    {
        return view('dashboard.appointments', [
            'stats' => MockData::dashboardStats(),
            'doctor' => MockData::doctors()[0],
        ]);
    }

    public function patients()
    {
        return view('dashboard.patients', [
            'doctor' => MockData::doctors()[0],
        ]);
    }

    public function profile()
    {
        return view('dashboard.profile', [
            'doctor' => MockData::doctors()[0],
        ]);
    }

    public function reviews()
    {
        return view('dashboard.reviews', [
            'doctor' => MockData::doctors()[0],
        ]);
    }
}
