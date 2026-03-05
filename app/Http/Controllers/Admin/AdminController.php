<?php

namespace App\Http\Controllers\Admin;

use App\Data\MockData;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'stats' => MockData::adminStats(),
            'platformStats' => MockData::stats(),
        ]);
    }

    public function doctors()
    {
        return view('admin.doctors', [
            'doctors' => MockData::doctors(),
        ]);
    }

    public function clinics()
    {
        return view('admin.clinics', [
            'clinics' => MockData::clinics(),
        ]);
    }

    public function users()
    {
        return view('admin.users');
    }

    public function reports()
    {
        return view('admin.reports', [
            'stats' => MockData::adminStats(),
        ]);
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
