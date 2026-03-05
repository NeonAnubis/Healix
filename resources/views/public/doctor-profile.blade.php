@extends('layouts.app')
@section('title', $doctor['name'] . ' - ' . $doctor['specialty'])
@section('meta_description', $doctor['name'] . ' is a board-certified ' . $doctor['specialty'] . ' specialist at ' . $doctor['hospital'] . '. Book an appointment today.')

@section('content')
<!-- Navigation -->
<nav class="fixed top-0 left-0 right-0 z-50 glass shadow-sm py-2">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center space-x-2">
            <div class="w-9 h-9 morphing-bg rounded-xl flex items-center justify-center"><svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C9 2 7 4.5 7 7s2 5 5 8c3-3 5-5.5 5-8s-2-5-5-5zm0 18c-3-3-5-5.5-5-8s2-5 5-5 5 2.5 5 5-2 5-5 8z" fill-rule="evenodd"/></svg></div>
            <span class="text-xl font-display font-bold gradient-text">Healix</span>
        </a>
        <div class="flex items-center space-x-3">
            <a href="{{ route('doctors.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-medical-600">All Doctors</a>
            <a href="{{ route('login') }}" class="px-5 py-2.5 text-sm font-semibold text-white morphing-bg rounded-xl">Sign In</a>
        </div>
    </div>
</nav>

<!-- Doctor Profile Hero -->
<section class="pt-20 pb-8 bg-gradient-to-b from-medical-50/50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-sm text-gray-500 mb-6 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-medical-600">Home</a><span>/</span>
            <a href="{{ route('doctors.index') }}" class="hover:text-medical-600">Doctors</a><span>/</span>
            <span class="text-gray-900">{{ $doctor['name'] }}</span>
        </nav>

        <div class="flex flex-col md:flex-row gap-6 items-start">
            <img src="{{ $doctor['image'] }}" class="w-32 h-32 md:w-40 md:h-40 rounded-2xl object-cover shadow-lg ring-4 ring-white" alt="{{ $doctor['name'] }}">
            <div class="flex-1">
                <div class="flex items-center space-x-3 flex-wrap gap-2">
                    <h1 class="text-2xl sm:text-3xl font-display font-bold text-gray-900">{{ $doctor['name'] }}</h1>
                    @if($doctor['verified'])<span class="inline-flex items-center px-2.5 py-1 bg-blue-50 text-blue-700 text-xs font-semibold rounded-full"><svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Verified</span>@endif
                </div>
                <p class="text-medical-600 font-semibold mt-1">{{ $doctor['specialty'] }} &middot; {{ $doctor['sub_specialty'] }}</p>
                <p class="text-gray-500 text-sm mt-1">{{ $doctor['hospital'] }} &middot; {{ $doctor['location'] }}</p>

                <div class="flex flex-wrap items-center gap-4 mt-4">
                    <div class="flex items-center space-x-1">
                        @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 {{ $i < floor($doctor['rating']) ? 'text-amber-400' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                        <span class="font-bold text-gray-900 ml-1">{{ $doctor['rating'] }}</span>
                        <span class="text-sm text-gray-500">({{ $doctor['reviews_count'] }} reviews)</span>
                    </div>
                    <span class="text-sm text-gray-400">|</span>
                    <span class="text-sm text-gray-600">{{ $doctor['experience_years'] }} years experience</span>
                    <span class="text-sm text-gray-400">|</span>
                    <span class="text-sm text-gray-600">{{ $doctor['education'] }}</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Profile Content -->
<section class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content with Tabs -->
            <div class="flex-1" x-data="{ tab: 'overview' }">
                <!-- Tabs -->
                <div class="flex space-x-1 bg-gray-100 rounded-xl p-1 mb-8">
                    <button @click="tab='overview'" :class="tab==='overview' ? 'bg-white shadow text-gray-900' : 'text-gray-500 hover:text-gray-700'" class="flex-1 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all">Overview</button>
                    <button @click="tab='experience'" :class="tab==='experience' ? 'bg-white shadow text-gray-900' : 'text-gray-500 hover:text-gray-700'" class="flex-1 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all">Experience</button>
                    <button @click="tab='reviews'" :class="tab==='reviews' ? 'bg-white shadow text-gray-900' : 'text-gray-500 hover:text-gray-700'" class="flex-1 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all">Reviews</button>
                    <button @click="tab='location'" :class="tab==='location' ? 'bg-white shadow text-gray-900' : 'text-gray-500 hover:text-gray-700'" class="flex-1 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all">Location</button>
                </div>

                <!-- Overview Tab -->
                <div x-show="tab==='overview'" x-transition>
                    <div class="bg-white rounded-2xl border border-gray-100 p-6 mb-6">
                        <h2 class="text-lg font-display font-bold text-gray-900 mb-3">About</h2>
                        <p class="text-gray-600 leading-relaxed">{{ $doctor['bio'] }}</p>
                    </div>

                    <div class="bg-white rounded-2xl border border-gray-100 p-6 mb-6">
                        <h2 class="text-lg font-display font-bold text-gray-900 mb-4">Services</h2>
                        <div class="grid grid-cols-2 gap-3">
                            @foreach($doctor['services'] as $service)
                            <div class="flex items-center space-x-2 p-3 bg-gray-50 rounded-xl">
                                <div class="w-2 h-2 bg-medical-500 rounded-full"></div>
                                <span class="text-sm text-gray-700">{{ $service }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-6">
                        <div class="bg-white rounded-2xl border border-gray-100 p-6">
                            <h2 class="text-lg font-display font-bold text-gray-900 mb-3">Languages</h2>
                            <div class="flex flex-wrap gap-2">
                                @foreach($doctor['languages'] as $lang)
                                <span class="px-3 py-1.5 bg-primary-50 text-primary-700 rounded-full text-sm font-medium">{{ $lang }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="bg-white rounded-2xl border border-gray-100 p-6">
                            <h2 class="text-lg font-display font-bold text-gray-900 mb-3">Insurance Accepted</h2>
                            <div class="flex flex-wrap gap-2">
                                @foreach($doctor['insurance'] as $ins)
                                <span class="px-3 py-1.5 bg-accent-50 text-accent-700 rounded-full text-sm font-medium">{{ $ins }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Experience Tab -->
                <div x-show="tab==='experience'" x-transition>
                    <div class="bg-white rounded-2xl border border-gray-100 p-6 space-y-6">
                        <div>
                            <h3 class="font-display font-bold text-gray-900 mb-2">Education</h3>
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-primary-100 rounded-xl flex items-center justify-center mt-0.5"><i data-lucide="graduation-cap" class="w-5 h-5 text-primary-600"></i></div>
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $doctor['education'] }}</p>
                                    <p class="text-sm text-gray-500">Doctor of Medicine (M.D.)</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-display font-bold text-gray-900 mb-2">Experience</h3>
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-accent-100 rounded-xl flex items-center justify-center mt-0.5"><i data-lucide="briefcase" class="w-5 h-5 text-accent-600"></i></div>
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $doctor['experience_years'] }} Years of Practice</p>
                                    <p class="text-sm text-gray-500">Currently at {{ $doctor['hospital'] }}, {{ $doctor['location'] }}</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-display font-bold text-gray-900 mb-2">Board Certifications</h3>
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-medical-100 rounded-xl flex items-center justify-center mt-0.5"><i data-lucide="award" class="w-5 h-5 text-medical-600"></i></div>
                                <div>
                                    <p class="font-semibold text-gray-900">Board Certified in {{ $doctor['specialty'] }}</p>
                                    <p class="text-sm text-gray-500">Subspecialty: {{ $doctor['sub_specialty'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reviews Tab -->
                <div x-show="tab==='reviews'" x-transition>
                    <div class="space-y-4">
                        @php
                        $mockReviews = [
                            ['name' => 'Amanda K.', 'rating' => 5, 'date' => '2 weeks ago', 'text' => 'Exceptional care and attention to detail. Took the time to explain everything thoroughly and made me feel completely at ease.'],
                            ['name' => 'Brian T.', 'rating' => 5, 'date' => '1 month ago', 'text' => 'Best doctor I have ever been to. Professional, knowledgeable, and genuinely cares about patients. Highly recommend!'],
                            ['name' => 'Carol M.', 'rating' => 4, 'date' => '1 month ago', 'text' => 'Great experience overall. Wait time was a bit long but the quality of care more than made up for it.'],
                            ['name' => 'David R.', 'rating' => 5, 'date' => '2 months ago', 'text' => 'Saved my life - literally. The diagnosis was accurate and the treatment plan has been incredibly effective.'],
                        ];
                        @endphp
                        @foreach($mockReviews as $review)
                        <div class="bg-white rounded-2xl border border-gray-100 p-6">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center font-semibold text-gray-600">{{ substr($review['name'], 0, 1) }}</div>
                                    <div>
                                        <p class="font-semibold text-gray-900">{{ $review['name'] }}</p>
                                        <p class="text-xs text-gray-500">{{ $review['date'] }}</p>
                                    </div>
                                </div>
                                <div class="flex space-x-0.5">
                                    @for($i = 0; $i < $review['rating']; $i++)
                                    <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    @endfor
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $review['text'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Location Tab -->
                <div x-show="tab==='location'" x-transition>
                    <div class="bg-white rounded-2xl border border-gray-100 p-6">
                        <h3 class="font-display font-bold text-gray-900 mb-4">{{ $doctor['hospital'] }}</h3>
                        <p class="text-gray-600 mb-4">{{ $doctor['location'] }}</p>
                        <div class="w-full h-64 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400">
                            <div class="text-center">
                                <i data-lucide="map" class="w-12 h-12 mx-auto mb-2"></i>
                                <p class="text-sm">Interactive map would display here</p>
                                <p class="text-xs text-gray-400 mt-1">Lat: {{ $doctor['lat'] }}, Lng: {{ $doctor['lng'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Sidebar -->
            <aside class="lg:w-80">
                <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-lg sticky top-24">
                    <div class="text-center mb-6">
                        <div class="text-3xl font-display font-bold text-gray-900">${{ $doctor['consultation_fee'] }}</div>
                        <div class="text-sm text-gray-500">per consultation</div>
                    </div>

                    <div class="space-y-4 mb-6">
                        <div class="flex items-center space-x-3 text-sm">
                            <i data-lucide="clock" class="w-4 h-4 text-medical-500"></i>
                            <div>
                                <span class="text-gray-500">Next Available:</span>
                                <span class="font-semibold text-gray-900 ml-1">{{ $doctor['next_available'] }}</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 text-sm">
                            <i data-lucide="video" class="w-4 h-4 text-medical-500"></i>
                            <span class="text-gray-600">Video consultation available</span>
                        </div>
                        <div class="flex items-center space-x-3 text-sm">
                            @if($doctor['accepting_patients'])
                            <i data-lucide="user-check" class="w-4 h-4 text-green-500"></i>
                            <span class="text-green-600 font-medium">Accepting new patients</span>
                            @else
                            <i data-lucide="user-x" class="w-4 h-4 text-red-500"></i>
                            <span class="text-red-600 font-medium">Not accepting new patients</span>
                            @endif
                        </div>
                    </div>

                    <!-- Date Picker Mock -->
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Select Date</label>
                        <input type="date" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 focus:border-medical-300 outline-none">
                    </div>

                    <!-- Time Slots -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Available Times</label>
                        <div class="grid grid-cols-3 gap-2" x-data="{ selected: '2:30 PM' }">
                            @foreach(['9:00 AM', '10:30 AM', '11:00 AM', '1:00 PM', '2:30 PM', '4:00 PM'] as $time)
                            <button @click="selected='{{ $time }}'" :class="selected==='{{ $time }}' ? 'bg-medical-500 text-white border-medical-500' : 'bg-white text-gray-700 border-gray-200 hover:border-medical-300'" class="px-2 py-2 border rounded-lg text-xs font-medium transition-colors">{{ $time }}</button>
                            @endforeach
                        </div>
                    </div>

                    <button class="w-full py-3.5 morphing-bg text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all">
                        Book Appointment
                    </button>
                    <p class="text-xs text-gray-400 text-center mt-3">Free cancellation up to 24 hours before</p>
                </div>
            </aside>
        </div>

        <!-- Related Doctors -->
        @if($relatedDoctors->count() > 0)
        <div class="mt-16">
            <h2 class="text-2xl font-display font-bold text-gray-900 mb-6">Similar <span class="gradient-text">Doctors</span></h2>
            <div class="grid sm:grid-cols-3 gap-6">
                @foreach($relatedDoctors as $related)
                <a href="{{ route('doctors.show', $related['slug']) }}" class="card-hover group bg-white border border-gray-100 rounded-2xl overflow-hidden">
                    <img src="{{ $related['image'] }}" class="w-full h-48 object-cover" alt="{{ $related['name'] }}">
                    <div class="p-5">
                        <h3 class="font-display font-bold text-gray-900 group-hover:text-medical-600">{{ $related['name'] }}</h3>
                        <p class="text-sm text-medical-600 mt-1">{{ $related['specialty'] }}</p>
                        <div class="flex items-center justify-between mt-3"><div class="flex items-center space-x-1"><svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg><span class="text-sm font-semibold">{{ $related['rating'] }}</span></div><span class="text-sm font-bold">${{ $related['consultation_fee'] }}</span></div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
