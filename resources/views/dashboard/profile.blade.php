@extends('layouts.app')
@section('title', 'My Profile')
@section('content')
@include('dashboard.partials.sidebar')
<main class="ml-64 min-h-screen bg-gray-50">
    <header class="bg-white border-b border-gray-100 px-8 py-4"><h1 class="text-xl font-display font-bold text-gray-900">My Profile</h1></header>
    <div class="p-8 max-w-4xl">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 mb-6">
            <div class="flex items-center space-x-6 mb-8">
                <div class="relative"><img src="{{ $doctor['image'] }}" class="w-24 h-24 rounded-2xl object-cover ring-4 ring-gray-100"><button class="absolute -bottom-2 -right-2 w-8 h-8 bg-medical-500 rounded-full flex items-center justify-center text-white shadow-lg"><i data-lucide="camera" class="w-4 h-4"></i></button></div>
                <div><h2 class="text-xl font-display font-bold text-gray-900">{{ $doctor['name'] }}</h2><p class="text-medical-600 font-medium">{{ $doctor['specialty'] }} - {{ $doctor['sub_specialty'] }}</p><span class="inline-flex items-center px-2.5 py-1 bg-blue-50 text-blue-700 text-xs font-medium rounded-full mt-2"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Verified Profile</span></div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div><label class="block text-sm font-semibold text-gray-700 mb-1.5">Full Name</label><input type="text" value="{{ $doctor['name'] }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 outline-none"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-1.5">Specialty</label><input type="text" value="{{ $doctor['specialty'] }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 outline-none"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-1.5">Sub-Specialty</label><input type="text" value="{{ $doctor['sub_specialty'] }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 outline-none"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-1.5">Consultation Fee ($)</label><input type="number" value="{{ $doctor['consultation_fee'] }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 outline-none"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-1.5">Education</label><input type="text" value="{{ $doctor['education'] }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 outline-none"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-1.5">Hospital</label><input type="text" value="{{ $doctor['hospital'] }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 outline-none"></div>
            </div>

            <div class="mt-6"><label class="block text-sm font-semibold text-gray-700 mb-1.5">Bio</label><textarea rows="4" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 outline-none">{{ $doctor['bio'] }}</textarea></div>

            <div class="mt-6"><label class="block text-sm font-semibold text-gray-700 mb-3">Languages</label>
                <div class="flex flex-wrap gap-2">
                    @foreach($doctor['languages'] as $lang)<span class="px-3 py-1.5 bg-primary-50 text-primary-700 rounded-full text-sm font-medium flex items-center">{{ $lang }}<button class="ml-2 text-primary-400 hover:text-primary-600">&times;</button></span>@endforeach
                    <button class="px-3 py-1.5 border border-dashed border-gray-300 rounded-full text-sm text-gray-500 hover:border-medical-300">+ Add</button>
                </div>
            </div>

            <div class="mt-6"><label class="block text-sm font-semibold text-gray-700 mb-3">Services</label>
                <div class="flex flex-wrap gap-2">
                    @foreach($doctor['services'] as $svc)<span class="px-3 py-1.5 bg-medical-50 text-medical-700 rounded-full text-sm font-medium flex items-center">{{ $svc }}<button class="ml-2 text-medical-400 hover:text-medical-600">&times;</button></span>@endforeach
                    <button class="px-3 py-1.5 border border-dashed border-gray-300 rounded-full text-sm text-gray-500 hover:border-medical-300">+ Add</button>
                </div>
            </div>

            <div class="mt-6"><label class="block text-sm font-semibold text-gray-700 mb-3">Insurance Accepted</label>
                <div class="grid grid-cols-3 gap-2">
                    @foreach(['Aetna','Blue Cross','Cigna','United Health','Medicare','Kaiser','Humana','Blue Shield','Medicaid'] as $ins)
                    <label class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" {{ in_array($ins, $doctor['insurance']) ? 'checked' : '' }} class="w-4 h-4 rounded border-gray-300 text-medical-600 focus:ring-medical-300">
                        <span class="text-sm text-gray-700">{{ $ins }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="mt-8 flex justify-end"><button class="px-8 py-3 morphing-bg text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all">Save Changes</button></div>
        </div>
    </div>
</main>
@endsection
