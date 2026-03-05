<?php

namespace App\Http\Controllers\Public;

use App\Data\MockData;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.home', [
            'doctors' => array_slice(MockData::doctors(), 0, 4),
            'clinics' => array_slice(MockData::clinics(), 0, 3),
            'specialties' => MockData::specialties(),
            'testimonials' => MockData::testimonials(),
            'stats' => MockData::stats(),
        ]);
    }
}
