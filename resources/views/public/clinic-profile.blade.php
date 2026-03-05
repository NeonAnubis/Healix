@extends('layouts.app')
@section('title', $clinic['name'])
@section('content')
<nav class="fixed top-0 left-0 right-0 z-50 glass shadow-sm py-2">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center space-x-2"><div class="w-9 h-9 morphing-bg rounded-xl flex items-center justify-center"><svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C9 2 7 4.5 7 7s2 5 5 8c3-3 5-5.5 5-8s-2-5-5-5zm0 18c-3-3-5-5.5-5-8s2-5 5-5 5 2.5 5 5-2 5-5 8z" fill-rule="evenodd"/></svg></div><span class="text-xl font-display font-bold gradient-text">Healix</span></a>
        <div class="flex items-center space-x-3"><a href="{{ route('clinics.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700">All Clinics</a><a href="{{ route('login') }}" class="px-5 py-2.5 text-sm font-semibold text-white morphing-bg rounded-xl">Sign In</a></div>
    </div>
</nav>

<!-- Hero -->
<section class="pt-20">
    <div class="relative h-72 sm:h-96">
        <img src="{{ $clinic['image'] }}" class="w-full h-full object-cover" alt="{{ $clinic['name'] }}">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-8 max-w-7xl mx-auto">
            <div class="flex items-center space-x-3 mb-2">
                <span class="px-3 py-1 glass-dark text-white text-xs font-medium rounded-full">{{ $clinic['type'] }}</span>
                @if($clinic['emergency'])<span class="px-3 py-1 bg-red-500 text-white text-xs font-bold rounded-full">24/7 Emergency</span>@endif
                @if($clinic['verified'])<span class="px-3 py-1 bg-blue-500 text-white text-xs font-medium rounded-full">Verified</span>@endif
            </div>
            <h1 class="text-3xl sm:text-4xl font-display font-bold text-white text-shadow-lg">{{ $clinic['name'] }}</h1>
            <div class="flex items-center space-x-4 mt-2 text-white/80 text-sm">
                <span class="flex items-center"><i data-lucide="map-pin" class="w-4 h-4 mr-1"></i>{{ $clinic['location'] }}</span>
                <span class="flex items-center"><svg class="w-4 h-4 text-amber-400 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>{{ $clinic['rating'] }} ({{ $clinic['reviews_count'] }} reviews)</span>
            </div>
        </div>
    </div>
</section>

<section class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <h2 class="text-lg font-display font-bold text-gray-900 mb-3">About</h2>
                    <p class="text-gray-600 leading-relaxed">{{ $clinic['description'] }}</p>
                </div>
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <h2 class="text-lg font-display font-bold text-gray-900 mb-4">Specialties</h2>
                    <div class="flex flex-wrap gap-2">
                        @foreach($clinic['specialties'] as $spec)
                        <span class="px-4 py-2 bg-medical-50 text-medical-700 rounded-xl text-sm font-medium">{{ $spec }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <h2 class="text-lg font-display font-bold text-gray-900 mb-4">Amenities</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @foreach($clinic['amenities'] as $amenity)
                        <div class="flex items-center space-x-2 text-sm text-gray-600"><div class="w-2 h-2 bg-accent-500 rounded-full"></div><span>{{ $amenity }}</span></div>
                        @endforeach
                    </div>
                </div>
                <!-- Doctors at this clinic -->
                <div>
                    <h2 class="text-xl font-display font-bold text-gray-900 mb-4">Our Doctors</h2>
                    <div class="grid sm:grid-cols-3 gap-4">
                        @foreach($doctors as $doc)
                        <a href="{{ route('doctors.show', $doc['slug']) }}" class="card-hover bg-white border border-gray-100 rounded-2xl p-4 text-center group">
                            <img src="{{ $doc['image'] }}" class="w-20 h-20 rounded-full object-cover mx-auto mb-3 ring-2 ring-gray-100" alt="{{ $doc['name'] }}">
                            <h3 class="font-semibold text-gray-900 text-sm group-hover:text-medical-600">{{ $doc['name'] }}</h3>
                            <p class="text-xs text-medical-600 mt-1">{{ $doc['specialty'] }}</p>
                            <div class="flex items-center justify-center space-x-1 mt-2"><svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg><span class="text-xs font-semibold">{{ $doc['rating'] }}</span></div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside>
                <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-lg sticky top-24 space-y-5">
                    <h3 class="font-display font-bold text-gray-900">Contact Information</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-start space-x-3"><i data-lucide="map-pin" class="w-4 h-4 text-medical-500 mt-0.5"></i><span class="text-gray-600">{{ $clinic['address'] }}</span></div>
                        <div class="flex items-center space-x-3"><i data-lucide="phone" class="w-4 h-4 text-medical-500"></i><span class="text-gray-600">{{ $clinic['phone'] }}</span></div>
                        <div class="flex items-center space-x-3"><i data-lucide="mail" class="w-4 h-4 text-medical-500"></i><span class="text-gray-600">{{ $clinic['email'] }}</span></div>
                        <div class="flex items-start space-x-3"><i data-lucide="clock" class="w-4 h-4 text-medical-500 mt-0.5"></i><span class="text-gray-600">{{ $clinic['hours'] }}</span></div>
                    </div>
                    <button class="w-full py-3 morphing-bg text-white font-semibold rounded-xl">Contact Clinic</button>
                    <button class="w-full py-3 bg-white text-medical-600 font-semibold rounded-xl border-2 border-medical-200 hover:bg-medical-50 transition-colors">Get Directions</button>
                </div>
            </aside>
        </div>
    </div>
</section>

<footer class="bg-gray-900 text-gray-300 py-12 mt-16"><div class="max-w-7xl mx-auto px-4 text-center"><p class="text-sm text-gray-500">&copy; {{ date('Y') }} Healix. All rights reserved.</p></div></footer>
@endsection
