@extends('layouts.app')
@section('title', 'Find Doctors')
@section('meta_description', 'Browse and discover top-rated doctors across all specialties. Filter by location, insurance, and availability.')

@section('content')
<!-- Navigation -->
<nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-500" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 50)" :class="scrolled ? 'glass shadow-lg shadow-gray-200/50 py-2' : 'bg-white shadow-sm py-3'">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                <div class="w-9 h-9 morphing-bg rounded-xl flex items-center justify-center"><svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C9 2 7 4.5 7 7s2 5 5 8c3-3 5-5.5 5-8s-2-5-5-5zm0 18c-3-3-5-5.5-5-8s2-5 5-5 5 2.5 5 5-2 5-5 8z" fill-rule="evenodd"/></svg></div>
                <span class="text-xl font-display font-bold gradient-text">Healix</span>
            </a>
            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('doctors.index') }}" class="px-4 py-2 text-sm font-semibold text-medical-600 bg-medical-50 rounded-lg">Find Doctors</a>
                <a href="{{ route('clinics.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-medical-600 rounded-lg hover:bg-medical-50 transition-all">Clinics</a>
            </div>
            <div class="hidden md:flex items-center space-x-3">
                <a href="{{ route('login') }}" class="px-5 py-2.5 text-sm font-semibold text-gray-700">Sign In</a>
                <a href="{{ route('register') }}" class="px-5 py-2.5 text-sm font-semibold text-white morphing-bg rounded-xl">Get Started</a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Search -->
<section class="pt-24 pb-8 bg-gradient-to-b from-medical-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl sm:text-4xl font-display font-bold text-gray-900 mb-2" data-aos="fade-up">Find Your <span class="gradient-text">Doctor</span></h1>
        <p class="text-gray-600 mb-6" data-aos="fade-up" data-aos-delay="50">Discover top-rated healthcare professionals near you</p>
        <div class="glass rounded-2xl p-3 shadow-lg" data-aos="fade-up" data-aos-delay="100">
            <div class="flex flex-col sm:flex-row gap-2">
                <div class="flex-1 flex items-center px-4 py-3 bg-white rounded-xl"><i data-lucide="search" class="w-5 h-5 text-gray-400 mr-3"></i><input type="text" placeholder="Search by name, specialty, or condition..." class="w-full text-sm focus:outline-none"></div>
                <div class="flex items-center px-4 py-3 bg-white rounded-xl sm:w-48"><i data-lucide="map-pin" class="w-5 h-5 text-gray-400 mr-3"></i><input type="text" placeholder="City or ZIP" class="w-full text-sm focus:outline-none"></div>
                <button class="px-8 py-3 morphing-bg text-white font-semibold rounded-xl text-sm">Search</button>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-8" x-data="{ viewMode: 'grid', showFilters: true }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filters -->
            <aside class="lg:w-72 flex-shrink-0" x-show="showFilters" x-transition>
                <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm sticky top-24 space-y-6">
                    <div class="flex items-center justify-between">
                        <h3 class="font-display font-bold text-gray-900">Filters</h3>
                        <button class="text-sm text-medical-600 hover:underline">Reset All</button>
                    </div>

                    <!-- Specialty -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Specialty</label>
                        <select class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 focus:border-medical-300 outline-none">
                            <option value="">All Specialties</option>
                            @foreach($specialties as $spec)
                            <option>{{ $spec['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Availability -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Availability</label>
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <div class="relative" x-data="{ on: false }">
                                <input type="checkbox" class="sr-only" @click="on = !on">
                                <div class="w-10 h-6 rounded-full transition-colors" :class="on ? 'bg-medical-500' : 'bg-gray-200'"></div>
                                <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform" :class="on ? 'translate-x-4' : ''"></div>
                            </div>
                            <span class="text-sm text-gray-600">Available Today</span>
                        </label>
                    </div>

                    <!-- Price Range -->
                    <div x-data="{ minFee: 100, maxFee: 500 }">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Consultation Fee</label>
                        <div class="flex items-center space-x-2 text-sm text-gray-500 mb-2">
                            <span x-text="'$' + minFee"></span><span>-</span><span x-text="'$' + maxFee"></span>
                        </div>
                        <input type="range" min="50" max="500" step="25" x-model="maxFee" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-medical-500">
                    </div>

                    <!-- Rating -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Minimum Rating</label>
                        <div class="flex space-x-1" x-data="{ rating: 0 }">
                            <template x-for="star in 5">
                                <button @click="rating = star" class="focus:outline-none">
                                    <svg class="w-6 h-6 transition-colors" :class="star <= rating ? 'text-amber-400' : 'text-gray-200'" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- Insurance -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Insurance</label>
                        <select class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 outline-none">
                            <option value="">Any Insurance</option>
                            <option>Aetna</option><option>Blue Cross</option><option>Cigna</option>
                            <option>United Health</option><option>Medicare</option><option>Kaiser</option>
                        </select>
                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Gender</label>
                        <div class="flex gap-2">
                            <button class="flex-1 px-3 py-2 text-sm border border-gray-200 rounded-xl hover:border-medical-300 hover:text-medical-600 transition-colors">Any</button>
                            <button class="flex-1 px-3 py-2 text-sm border border-gray-200 rounded-xl hover:border-medical-300 hover:text-medical-600 transition-colors">Male</button>
                            <button class="flex-1 px-3 py-2 text-sm border border-gray-200 rounded-xl hover:border-medical-300 hover:text-medical-600 transition-colors">Female</button>
                        </div>
                    </div>

                    <button class="w-full py-3 morphing-bg text-white font-semibold rounded-xl text-sm">Apply Filters</button>
                </div>
            </aside>

            <!-- Results -->
            <div class="flex-1">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <span class="text-sm text-gray-500">Showing <strong class="text-gray-900">{{ count($doctors) }}</strong> doctors</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <select class="px-3 py-2 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 outline-none">
                            <option>Sort by Rating</option><option>Sort by Reviews</option><option>Fee: Low to High</option><option>Fee: High to Low</option><option>Experience</option>
                        </select>
                        <div class="flex border border-gray-200 rounded-xl overflow-hidden">
                            <button @click="viewMode='grid'" :class="viewMode==='grid' ? 'bg-medical-50 text-medical-600' : 'text-gray-400'" class="p-2"><i data-lucide="grid-3x3" class="w-4 h-4"></i></button>
                            <button @click="viewMode='list'" :class="viewMode==='list' ? 'bg-medical-50 text-medical-600' : 'text-gray-400'" class="p-2"><i data-lucide="list" class="w-4 h-4"></i></button>
                        </div>
                        <button @click="showFilters = !showFilters" class="lg:hidden p-2 border border-gray-200 rounded-xl"><i data-lucide="sliders-horizontal" class="w-4 h-4"></i></button>
                    </div>
                </div>

                <!-- Grid View -->
                <div x-show="viewMode==='grid'" class="grid sm:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($doctors as $doctor)
                    <a href="{{ route('doctors.show', $doctor['slug']) }}" class="card-hover group bg-white border border-gray-100 rounded-2xl overflow-hidden">
                        <div class="relative">
                            <img src="{{ $doctor['image'] }}" class="w-full h-52 object-cover" alt="{{ $doctor['name'] }}">
                            @if($doctor['available_today'])<span class="absolute top-3 right-3 px-2.5 py-1 bg-green-500 text-white text-xs font-bold rounded-full">Available Today</span>@endif
                            @if($doctor['verified'])<span class="absolute top-3 left-3 w-7 h-7 bg-blue-500 rounded-full flex items-center justify-center"><svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>@endif
                        </div>
                        <div class="p-5">
                            <h3 class="font-display font-bold text-gray-900 group-hover:text-medical-600 transition-colors">{{ $doctor['name'] }}</h3>
                            <p class="text-sm text-medical-600 font-medium mt-1">{{ $doctor['specialty'] }} &middot; {{ $doctor['sub_specialty'] }}</p>
                            <p class="text-sm text-gray-500 mt-1 flex items-center"><i data-lucide="map-pin" class="w-3.5 h-3.5 mr-1"></i>{{ $doctor['location'] }}</p>
                            <p class="text-sm text-gray-500 mt-1 flex items-center"><i data-lucide="building-2" class="w-3.5 h-3.5 mr-1"></i>{{ $doctor['hospital'] }}</p>
                            <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-50">
                                <div class="flex items-center space-x-1">
                                    <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <span class="text-sm font-semibold">{{ $doctor['rating'] }}</span>
                                    <span class="text-xs text-gray-400">({{ $doctor['reviews_count'] }})</span>
                                </div>
                                <span class="text-sm font-bold text-gray-900">${{ $doctor['consultation_fee'] }}</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <!-- List View -->
                <div x-show="viewMode==='list'" class="space-y-4">
                    @foreach($doctors as $doctor)
                    <a href="{{ route('doctors.show', $doctor['slug']) }}" class="card-hover group flex flex-col sm:flex-row bg-white border border-gray-100 rounded-2xl overflow-hidden">
                        <img src="{{ $doctor['image'] }}" class="sm:w-48 h-48 sm:h-auto object-cover" alt="{{ $doctor['name'] }}">
                        <div class="flex-1 p-5 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center space-x-2">
                                    <h3 class="font-display font-bold text-gray-900 group-hover:text-medical-600 transition-colors">{{ $doctor['name'] }}</h3>
                                    @if($doctor['verified'])<svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>@endif
                                </div>
                                <p class="text-sm text-medical-600 font-medium mt-1">{{ $doctor['specialty'] }} &middot; {{ $doctor['sub_specialty'] }}</p>
                                <p class="text-sm text-gray-600 mt-2 line-clamp-2">{{ $doctor['bio'] }}</p>
                                <div class="flex flex-wrap gap-2 mt-3">
                                    <span class="px-2.5 py-1 bg-gray-50 text-gray-600 text-xs rounded-full">{{ $doctor['experience_years'] }}y exp</span>
                                    <span class="px-2.5 py-1 bg-gray-50 text-gray-600 text-xs rounded-full">{{ $doctor['location'] }}</span>
                                    @if($doctor['available_today'])<span class="px-2.5 py-1 bg-green-50 text-green-700 text-xs rounded-full font-medium">Available Today</span>@endif
                                </div>
                            </div>
                            <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-50">
                                <div class="flex items-center space-x-1"><svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg><span class="font-semibold text-sm">{{ $doctor['rating'] }}</span><span class="text-xs text-gray-400">({{ $doctor['reviews_count'] }} reviews)</span></div>
                                <div class="flex items-center space-x-3">
                                    <span class="text-lg font-bold text-gray-900">${{ $doctor['consultation_fee'] }}</span>
                                    <span class="px-4 py-2 bg-medical-50 text-medical-700 rounded-xl text-sm font-semibold group-hover:bg-medical-600 group-hover:text-white transition-colors">Book Now</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="flex items-center justify-center space-x-2 mt-10">
                    <button class="px-3 py-2 border border-gray-200 rounded-xl text-sm text-gray-400 cursor-not-allowed">Previous</button>
                    <button class="px-3.5 py-2 morphing-bg text-white rounded-xl text-sm font-semibold">1</button>
                    <button class="px-3.5 py-2 border border-gray-200 rounded-xl text-sm hover:border-medical-300">2</button>
                    <button class="px-3.5 py-2 border border-gray-200 rounded-xl text-sm hover:border-medical-300">3</button>
                    <span class="text-gray-400">...</span>
                    <button class="px-3.5 py-2 border border-gray-200 rounded-xl text-sm hover:border-medical-300">12</button>
                    <button class="px-3 py-2 border border-gray-200 rounded-xl text-sm hover:border-medical-300">Next</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-gray-300 py-12 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-sm text-gray-500">&copy; {{ date('Y') }} Healix. All rights reserved.</p>
    </div>
</footer>
@endsection
