@extends('layouts.app')
@section('title', 'Browse Clinics')
@section('content')
<nav class="fixed top-0 left-0 right-0 z-50 bg-white shadow-sm py-3">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center space-x-2"><div class="w-9 h-9 morphing-bg rounded-xl flex items-center justify-center"><svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C9 2 7 4.5 7 7s2 5 5 8c3-3 5-5.5 5-8s-2-5-5-5zm0 18c-3-3-5-5.5-5-8s2-5 5-5 5 2.5 5 5-2 5-5 8z" fill-rule="evenodd"/></svg></div><span class="text-xl font-display font-bold gradient-text">Healix</span></a>
        <div class="flex items-center space-x-3">
            <a href="{{ route('doctors.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-medical-600">Doctors</a>
            <a href="{{ route('clinics.index') }}" class="px-4 py-2 text-sm font-semibold text-medical-600 bg-medical-50 rounded-lg">Clinics</a>
            <a href="{{ route('login') }}" class="px-5 py-2.5 text-sm font-semibold text-white morphing-bg rounded-xl">Sign In</a>
        </div>
    </div>
</nav>

<section class="pt-24 pb-8 bg-gradient-to-b from-purple-50/50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl sm:text-4xl font-display font-bold text-gray-900 mb-2" data-aos="fade-up">Browse <span class="gradient-text">Clinics</span></h1>
        <p class="text-gray-600 mb-6" data-aos="fade-up">Find world-class healthcare facilities near you</p>
        <div class="glass rounded-2xl p-3 shadow-lg max-w-2xl" data-aos="fade-up">
            <div class="flex gap-2">
                <div class="flex-1 flex items-center px-4 py-3 bg-white rounded-xl"><i data-lucide="search" class="w-5 h-5 text-gray-400 mr-3"></i><input type="text" placeholder="Search clinics..." class="w-full text-sm focus:outline-none"></div>
                <button class="px-8 py-3 morphing-bg text-white font-semibold rounded-xl text-sm">Search</button>
            </div>
        </div>
    </div>
</section>

<section class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap gap-2 mb-8">
            <button class="px-4 py-2 bg-medical-50 text-medical-700 rounded-full text-sm font-medium border border-medical-200">All</button>
            <button class="px-4 py-2 bg-white text-gray-600 rounded-full text-sm font-medium border border-gray-200 hover:border-medical-300">Hospitals</button>
            <button class="px-4 py-2 bg-white text-gray-600 rounded-full text-sm font-medium border border-gray-200 hover:border-medical-300">Specialty Clinics</button>
            <button class="px-4 py-2 bg-white text-gray-600 rounded-full text-sm font-medium border border-gray-200 hover:border-medical-300">Research Centers</button>
            <button class="px-4 py-2 bg-white text-gray-600 rounded-full text-sm font-medium border border-gray-200 hover:border-medical-300">Emergency</button>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($clinics as $index => $clinic)
            <a href="{{ route('clinics.show', $clinic['slug']) }}" class="card-hover group bg-white rounded-2xl overflow-hidden border border-gray-100" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $clinic['image'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="{{ $clinic['name'] }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <span class="absolute bottom-3 left-3 px-3 py-1 glass-dark text-white text-xs font-medium rounded-full">{{ $clinic['type'] }}</span>
                    @if($clinic['emergency'])<span class="absolute top-3 right-3 px-2.5 py-1 bg-red-500 text-white text-xs font-bold rounded-full flex items-center space-x-1"><span class="w-1.5 h-1.5 bg-white rounded-full pulse-dot"></span><span>24/7 ER</span></span>@endif
                </div>
                <div class="p-6">
                    <h3 class="font-display font-bold text-lg text-gray-900 group-hover:text-medical-600 transition-colors">{{ $clinic['name'] }}</h3>
                    <div class="flex items-center mt-2 text-sm text-gray-500"><i data-lucide="map-pin" class="w-4 h-4 mr-1"></i>{{ $clinic['location'] }}</div>
                    <p class="mt-3 text-sm text-gray-600 line-clamp-2">{{ $clinic['description'] }}</p>
                    <div class="flex flex-wrap gap-1.5 mt-3">
                        @foreach(array_slice($clinic['specialties'], 0, 3) as $spec)
                        <span class="px-2 py-0.5 bg-medical-50 text-medical-700 text-xs rounded-full">{{ $spec }}</span>
                        @endforeach
                    </div>
                    <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-50">
                        <div class="flex items-center space-x-1"><svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg><span class="text-sm font-semibold">{{ $clinic['rating'] }}</span><span class="text-xs text-gray-400">({{ $clinic['reviews_count'] }})</span></div>
                        <span class="text-sm text-gray-500">{{ $clinic['doctors_count'] }} doctors</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<footer class="bg-gray-900 text-gray-300 py-12 mt-16"><div class="max-w-7xl mx-auto px-4 text-center"><p class="text-sm text-gray-500">&copy; {{ date('Y') }} Healix. All rights reserved.</p></div></footer>
@endsection
