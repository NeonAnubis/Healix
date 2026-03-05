@extends('layouts.app')

@section('title', 'Healix - Find Your Perfect Doctor')
@section('meta_description', 'Discover top-rated healthcare professionals. Book appointments instantly. Your health journey starts here.')

@section('styles')
.hero-parallax {
    perspective: 1000px;
}
.hero-card {
    transform-style: preserve-3d;
    transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1);
}
.hero-card:hover {
    transform: rotateY(-5deg) rotateX(5deg) translateZ(20px);
}
.counter-value {
    font-variant-numeric: tabular-nums;
}
.specialty-card {
    transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
}
.specialty-card:hover {
    transform: translateY(-12px) scale(1.02);
}
.organic-shape {
    border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
    animation: morph 8s ease-in-out infinite;
}
@keyframes morph {
    0% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
    50% { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; }
    100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
}
.parallax-layer {
    will-change: transform;
}
.testimonial-card {
    transition: all 0.4s ease;
}
.testimonial-card:hover {
    transform: scale(1.03);
}
@endsection

@section('content')
<!-- Navigation -->
<nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-500" x-data="{ scrolled: false }"
     @scroll.window="scrolled = (window.pageYOffset > 50)"
     :class="scrolled ? 'glass shadow-lg shadow-gray-200/50 py-2' : 'bg-transparent py-4'">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-2 group">
                <div class="w-10 h-10 morphing-bg rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-shadow">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C9 2 7 4.5 7 7s2 5 5 8c3-3 5-5.5 5-8s-2-5-5-5zm0 18c-3-3-5-5.5-5-8s2-5 5-5 5 2.5 5 5-2 5-5 8z" fill-rule="evenodd" />
                    </svg>
                </div>
                <span class="text-xl font-display font-bold gradient-text">Healix</span>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('doctors.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-medical-600 rounded-lg hover:bg-medical-50 transition-all">Find Doctors</a>
                <a href="{{ route('clinics.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-medical-600 rounded-lg hover:bg-medical-50 transition-all">Clinics</a>
                <a href="#specialties" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-medical-600 rounded-lg hover:bg-medical-50 transition-all">Specialties</a>
                <a href="#how-it-works" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-medical-600 rounded-lg hover:bg-medical-50 transition-all">How It Works</a>
            </div>

            <!-- CTA Buttons -->
            <div class="hidden md:flex items-center space-x-3">
                <a href="{{ route('login') }}" class="px-5 py-2.5 text-sm font-semibold text-gray-700 hover:text-medical-700 transition-colors">Sign In</a>
                <a href="{{ route('register') }}" class="px-5 py-2.5 text-sm font-semibold text-white morphing-bg rounded-xl shadow-lg hover:shadow-xl transition-all hover:scale-105">
                    Get Started
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button @click="mobileMenu = !mobileMenu" class="md:hidden p-2 rounded-lg hover:bg-gray-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path x-show="mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenu" x-cloak x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
             class="md:hidden mt-4 pb-4 border-t border-gray-100">
            <div class="pt-4 space-y-2">
                <a href="{{ route('doctors.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-medical-50 rounded-lg">Find Doctors</a>
                <a href="{{ route('clinics.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-medical-50 rounded-lg">Clinics</a>
                <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-700 hover:bg-medical-50 rounded-lg">Sign In</a>
                <a href="{{ route('register') }}" class="block px-4 py-2.5 text-center text-white morphing-bg rounded-xl font-semibold">Get Started</a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="relative min-h-screen hero-gradient overflow-hidden pt-20">
    <!-- Floating medical elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-medical-200/30 rounded-full blur-3xl float-animation"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-primary-200/20 rounded-full blur-3xl float-animation" style="animation-delay: -3s;"></div>
        <div class="absolute top-1/3 right-1/4 w-48 h-48 bg-accent-200/25 rounded-full blur-2xl float-animation" style="animation-delay: -1.5s;"></div>

        <!-- DNA Helix decoration -->
        <svg class="absolute top-32 right-20 w-24 h-24 text-medical-200/40 float-animation" style="animation-delay: -2s;" viewBox="0 0 100 100" fill="currentColor">
            <circle cx="20" cy="20" r="4"/><circle cx="80" cy="20" r="4"/>
            <circle cx="35" cy="40" r="3"/><circle cx="65" cy="40" r="3"/>
            <circle cx="20" cy="60" r="4"/><circle cx="80" cy="60" r="4"/>
            <circle cx="35" cy="80" r="3"/><circle cx="65" cy="80" r="3"/>
            <line x1="20" y1="20" x2="80" y2="20" stroke="currentColor" stroke-width="1" opacity="0.5"/>
            <line x1="35" y1="40" x2="65" y2="40" stroke="currentColor" stroke-width="1" opacity="0.5"/>
            <line x1="20" y1="60" x2="80" y2="60" stroke="currentColor" stroke-width="1" opacity="0.5"/>
        </svg>

        <!-- Stethoscope decoration -->
        <svg class="absolute bottom-40 left-20 w-20 h-20 text-primary-200/30 float-animation" style="animation-delay: -4s;" fill="currentColor" viewBox="0 0 24 24">
            <path d="M19 8C20.6569 8 22 6.65685 22 5C22 3.34315 20.6569 2 19 2C17.3431 2 16 3.34315 16 5C16 6.65685 17.3431 8 19 8Z"/>
            <path d="M19 8V10C19 13.3137 16.3137 16 13 16H11C7.68629 16 5 13.3137 5 10V4" fill="none" stroke="currentColor" stroke-width="2"/>
        </svg>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-24">
        <div class="grid lg:grid-cols-2 gap-12 items-center min-h-[80vh]">
            <!-- Left Column - Text Content -->
            <div class="space-y-8" data-aos="fade-right" data-aos-duration="1000">
                <div class="inline-flex items-center space-x-2 px-4 py-2 bg-medical-50 border border-medical-200 rounded-full text-medical-700 text-sm font-medium">
                    <span class="w-2 h-2 bg-medical-500 rounded-full pulse-dot"></span>
                    <span>Trusted by 2M+ patients worldwide</span>
                </div>

                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-display font-extrabold leading-tight tracking-tight">
                    Your Health
                    <span class="block gradient-text">Deserves the</span>
                    <span class="block">Best Care</span>
                </h1>

                <p class="text-lg sm:text-xl text-gray-600 max-w-lg leading-relaxed">
                    Discover world-class doctors, cutting-edge clinics, and personalized care paths.
                    Book instantly. Get better, faster.
                </p>

                <!-- Search Bar -->
                <div class="glass rounded-2xl p-2 shadow-xl shadow-gray-200/50 max-w-xl" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex flex-col sm:flex-row gap-2">
                        <div class="flex-1 flex items-center px-4 py-3 bg-white rounded-xl">
                            <i data-lucide="search" class="w-5 h-5 text-gray-400 mr-3"></i>
                            <input type="text" placeholder="Search doctors, specialties, conditions..."
                                   class="w-full text-sm focus:outline-none placeholder-gray-400">
                        </div>
                        <div class="flex items-center px-4 py-3 bg-white rounded-xl sm:w-44">
                            <i data-lucide="map-pin" class="w-5 h-5 text-gray-400 mr-3"></i>
                            <input type="text" placeholder="Location" class="w-full text-sm focus:outline-none placeholder-gray-400">
                        </div>
                        <a href="{{ route('doctors.index') }}" class="px-6 py-3 morphing-bg text-white font-semibold rounded-xl hover:shadow-lg transition-all text-center text-sm whitespace-nowrap">
                            Search
                        </a>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="flex flex-wrap gap-8 pt-4" data-aos="fade-up" data-aos-delay="400">
                    <div x-data="{ count: 0 }" x-init="
                        let target = 12480;
                        let step = Math.ceil(target / 60);
                        let interval = setInterval(() => {
                            count += step;
                            if (count >= target) { count = target; clearInterval(interval); }
                        }, 30)
                    ">
                        <div class="text-3xl font-display font-bold text-gray-900 counter-value" x-text="count.toLocaleString() + '+'"></div>
                        <div class="text-sm text-gray-500 font-medium">Verified Doctors</div>
                    </div>
                    <div x-data="{ count: 0 }" x-init="
                        let target = 3250;
                        let step = Math.ceil(target / 60);
                        let interval = setInterval(() => {
                            count += step;
                            if (count >= target) { count = target; clearInterval(interval); }
                        }, 30)
                    ">
                        <div class="text-3xl font-display font-bold text-gray-900 counter-value" x-text="count.toLocaleString() + '+'"></div>
                        <div class="text-sm text-gray-500 font-medium">Partner Clinics</div>
                    </div>
                    <div x-data="{ count: 0 }" x-init="
                        let target = 97;
                        let step = 1;
                        let interval = setInterval(() => {
                            count += step;
                            if (count >= target) { count = target; clearInterval(interval); }
                        }, 30)
                    ">
                        <div class="text-3xl font-display font-bold text-gray-900 counter-value" x-text="count + '%'"></div>
                        <div class="text-sm text-gray-500 font-medium">Patient Satisfaction</div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Hero Visual -->
            <div class="relative hero-parallax hidden lg:block" data-aos="fade-left" data-aos-duration="1200">
                <!-- Main hero image -->
                <div class="relative">
                    <div class="organic-shape overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=600&h=700&fit=crop&crop=face"
                             alt="Professional female doctor smiling"
                             class="w-full h-[500px] object-cover">
                    </div>

                    <!-- Floating doctor card -->
                    <div class="absolute -left-16 top-12 hero-card glass rounded-2xl p-4 shadow-xl w-64" data-aos="fade-right" data-aos-delay="600">
                        <div class="flex items-center space-x-3">
                            <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?w=80&h=80&fit=crop&crop=face"
                                 class="w-12 h-12 rounded-full object-cover ring-2 ring-medical-300" alt="Doctor">
                            <div>
                                <div class="font-semibold text-sm text-gray-900">Dr. Sarah Chen</div>
                                <div class="text-xs text-gray-500">Cardiology</div>
                            </div>
                        </div>
                        <div class="mt-3 flex items-center justify-between">
                            <div class="flex items-center space-x-1">
                                <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <span class="text-sm font-semibold">4.9</span>
                                <span class="text-xs text-gray-400">(312)</span>
                            </div>
                            <span class="px-2.5 py-1 bg-accent-100 text-accent-700 rounded-full text-xs font-medium">Available</span>
                        </div>
                    </div>

                    <!-- Floating appointment card -->
                    <div class="absolute -right-8 bottom-20 hero-card glass rounded-2xl p-4 shadow-xl w-56" data-aos="fade-left" data-aos-delay="800">
                        <div class="flex items-center space-x-2 mb-3">
                            <div class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center">
                                <i data-lucide="calendar-check" class="w-4 h-4 text-primary-600"></i>
                            </div>
                            <span class="text-sm font-semibold text-gray-900">Appointment Booked</span>
                        </div>
                        <div class="text-xs text-gray-500">Today at 2:30 PM</div>
                        <div class="mt-2 w-full bg-accent-100 rounded-full h-1.5">
                            <div class="bg-accent-500 h-1.5 rounded-full w-3/4 shimmer"></div>
                        </div>
                        <div class="text-xs text-accent-600 mt-1 font-medium">Confirmed</div>
                    </div>

                    <!-- Floating stats card -->
                    <div class="absolute -left-8 bottom-4 hero-card glass rounded-2xl p-4 shadow-xl" data-aos="fade-up" data-aos-delay="1000">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <i data-lucide="trending-up" class="w-5 h-5 text-green-600"></i>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500">This Month</div>
                                <div class="text-lg font-bold text-gray-900">8.7M+</div>
                                <div class="text-xs text-green-600 font-medium">Appointments Booked</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Wave separator -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 50L48 45.7C96 41.3 192 32.7 288 30.2C384 27.7 480 31.3 576 38.5C672 45.7 768 56.3 864 58.8C960 61.3 1056 55.7 1152 48.5C1248 41.3 1344 32.7 1392 28.3L1440 24V100H1392C1344 100 1248 100 1152 100C1056 100 960 100 864 100C768 100 672 100 576 100C480 100 384 100 288 100C192 100 96 100 48 100H0V50Z" fill="white"/>
        </svg>
    </div>
</section>

<!-- Trusted By Section -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-sm font-medium text-gray-400 uppercase tracking-widest mb-8" data-aos="fade-up">Trusted by leading healthcare institutions</p>
        <div class="flex flex-wrap justify-center items-center gap-x-12 gap-y-6 opacity-40" data-aos="fade-up" data-aos-delay="100">
            <div class="text-2xl font-display font-bold text-gray-400">Mayo Clinic</div>
            <div class="text-2xl font-display font-bold text-gray-400">Cleveland Clinic</div>
            <div class="text-2xl font-display font-bold text-gray-400">Johns Hopkins</div>
            <div class="text-2xl font-display font-bold text-gray-400">Stanford Health</div>
            <div class="text-2xl font-display font-bold text-gray-400">Mass General</div>
        </div>
    </div>
</section>

<!-- Medical Image Carousel -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl sm:text-4xl font-display font-bold text-gray-900">
                World-Class <span class="gradient-text">Medical Care</span>
            </h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">State-of-the-art facilities and compassionate professionals dedicated to your well-being</p>
        </div>

        <div class="swiper medical-carousel rounded-2xl overflow-hidden shadow-xl" data-aos="zoom-in">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="relative h-[400px] sm:h-[500px]">
                        <img src="https://images.unsplash.com/photo-1504813184591-01572f98c85f?w=1200&h=500&fit=crop" class="w-full h-full object-cover" alt="Modern surgical suite">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                            <h3 class="text-2xl font-display font-bold text-shadow-lg">Advanced Surgical Suites</h3>
                            <p class="mt-2 text-white/80 max-w-lg">Equipped with the latest robotic surgery systems and real-time imaging technology</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="relative h-[400px] sm:h-[500px]">
                        <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=1200&h=500&fit=crop" class="w-full h-full object-cover" alt="Research laboratory">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                            <h3 class="text-2xl font-display font-bold text-shadow-lg">Cutting-Edge Research</h3>
                            <p class="mt-2 text-white/80 max-w-lg">Our partner institutions lead groundbreaking clinical trials and medical discoveries</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="relative h-[400px] sm:h-[500px]">
                        <img src="https://images.unsplash.com/photo-1666214280557-f1b5022eb634?w=1200&h=500&fit=crop" class="w-full h-full object-cover" alt="Patient care">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                            <h3 class="text-2xl font-display font-bold text-shadow-lg">Compassionate Care</h3>
                            <p class="mt-2 text-white/80 max-w-lg">Patient-centered approach with dedicated care coordinators for every step of your journey</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="relative h-[400px] sm:h-[500px]">
                        <img src="https://images.unsplash.com/photo-1516549655169-df83a0774514?w=1200&h=500&fit=crop" class="w-full h-full object-cover" alt="Medical technology">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                            <h3 class="text-2xl font-display font-bold text-shadow-lg">Digital Health Innovation</h3>
                            <p class="mt-2 text-white/80 max-w-lg">Telemedicine, AI diagnostics, and connected health devices for modern healthcare</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="relative h-[400px] sm:h-[500px]">
                        <img src="https://images.unsplash.com/photo-1581056771107-24ca5f033842?w=1200&h=500&fit=crop" class="w-full h-full object-cover" alt="Medical team collaboration">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                            <h3 class="text-2xl font-display font-bold text-shadow-lg">Multidisciplinary Teams</h3>
                            <p class="mt-2 text-white/80 max-w-lg">Collaborative care bringing together specialists for the best treatment outcomes</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next !text-white"></div>
            <div class="swiper-button-prev !text-white"></div>
        </div>
    </div>
</section>

<!-- Specialties Section -->
<section id="specialties" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-block px-4 py-1.5 bg-medical-50 text-medical-700 text-sm font-semibold rounded-full border border-medical-200 mb-4">Specialties</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-gray-900">
                Browse by <span class="gradient-text">Specialty</span>
            </h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto text-lg">Explore our comprehensive network of medical specialists across 48+ disciplines</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
            @foreach($specialties as $index => $specialty)
            <a href="{{ route('doctors.index', ['specialty' => $specialty['name']]) }}"
               class="specialty-card group relative bg-white border border-gray-100 rounded-2xl p-6 text-center hover:border-transparent hover:shadow-xl"
               data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                <div class="w-14 h-14 mx-auto rounded-2xl flex items-center justify-center mb-4 transition-all group-hover:scale-110"
                     style="background-color: {{ $specialty['color'] }}15;">
                    @switch($specialty['icon'])
                        @case('heart')
                            <svg class="w-7 h-7" style="color: {{ $specialty['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C9 2 7 4.5 7 7s2 5 5 8c3-3 5-5.5 5-8s-2-5-5-5zm0 18c-3-3-5-5.5-5-8s2-5 5-5 5 2.5 5 5-2 5-5 8z" fill-rule="evenodd"/></svg>
                            @break
                        @case('brain')
                            <svg class="w-7 h-7" style="color: {{ $specialty['color'] }}" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.5 2 6 4.5 6 7.5c0 1.5.5 2.5 1.5 3.5-.5 1-1 2-1 3.5C6.5 17 8.5 19 11 19.5V22h2v-2.5c2.5-.5 4.5-2.5 4.5-5 0-1.5-.5-2.5-1-3.5 1-.5 1.5-2 1.5-3.5C18 4.5 15.5 2 12 2z"/></svg>
                            @break
                        @case('sparkles')
                            <svg class="w-7 h-7" style="color: {{ $specialty['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                            @break
                        @case('bone')
                            <svg class="w-7 h-7" style="color: {{ $specialty['color'] }}" fill="currentColor" viewBox="0 0 24 24"><path d="M18.5 2.5c-1.4 0-2.5 1.1-2.5 2.5 0 .5.2 1 .4 1.4L9.6 13.1c-.4-.2-.9-.4-1.4-.4-1.4 0-2.5 1.1-2.5 2.5 0 .5.2 1 .4 1.4l-.7.7c-.4-.2-.9-.4-1.4-.4-1.4 0-2.5 1.1-2.5 2.5s1.1 2.5 2.5 2.5 2.5-1.1 2.5-2.5c0-.5-.2-1-.4-1.4l.7-.7c.4.2.9.4 1.4.4 1.4 0 2.5-1.1 2.5-2.5 0-.5-.2-1-.4-1.4l6.8-6.7c.4.2.9.4 1.4.4 1.4 0 2.5-1.1 2.5-2.5s-1.1-2.6-2.5-2.6z"/></svg>
                            @break
                        @case('baby')
                            <svg class="w-7 h-7" style="color: {{ $specialty['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-linecap="round" stroke-width="2" d="M8 14s1.5 2 4 2 4-2 4-2"/><circle cx="9" cy="10" r="1" fill="currentColor"/><circle cx="15" cy="10" r="1" fill="currentColor"/></svg>
                            @break
                        @case('mind')
                            <svg class="w-7 h-7" style="color: {{ $specialty['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                            @break
                        @case('ribbon')
                            <svg class="w-7 h-7" style="color: {{ $specialty['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C9.8 2 8 4 8 6.5S9 11 12 14c3-3 4-5.5 4-7.5S14.2 2 12 2zM8 21l4-7 4 7M8 21l1-4M16 21l-1-4"/></svg>
                            @break
                        @default
                            <svg class="w-7 h-7" style="color: {{ $specialty['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                    @endswitch
                </div>
                <h3 class="font-display font-semibold text-gray-900 group-hover:text-medical-700 transition-colors">{{ $specialty['name'] }}</h3>
                <p class="text-sm text-gray-500 mt-1">{{ $specialty['doctors_count'] }} doctors</p>

                <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity" style="background: linear-gradient(135deg, {{ $specialty['color'] }}08 0%, {{ $specialty['color'] }}15 100%);"></div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section id="how-it-works" class="py-20 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-medical-100/50 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-primary-100/50 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-block px-4 py-1.5 bg-primary-50 text-primary-700 text-sm font-semibold rounded-full border border-primary-200 mb-4">Simple Process</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-gray-900">
                How <span class="gradient-text">Healix</span> Works
            </h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto text-lg">Three simple steps to connect with the right healthcare professional</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 lg:gap-12">
            <!-- Step 1 -->
            <div class="relative" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 h-full">
                    <div class="w-16 h-16 morphing-bg rounded-2xl flex items-center justify-center text-white text-2xl font-display font-bold mb-6 shadow-lg">1</div>
                    <div class="mb-4">
                        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=400&h=200&fit=crop" class="rounded-xl w-full h-40 object-cover" alt="Search for doctors">
                    </div>
                    <h3 class="text-xl font-display font-bold text-gray-900 mb-3">Search & Discover</h3>
                    <p class="text-gray-600 leading-relaxed">Browse through verified profiles, read reviews, and filter by specialty, location, insurance, and availability.</p>
                </div>
                <!-- Connector arrow (hidden on mobile) -->
                <div class="hidden md:block absolute top-1/2 -right-6 lg:-right-8 z-10">
                    <svg class="w-12 h-12 text-medical-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="relative" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 h-full">
                    <div class="w-16 h-16 morphing-bg rounded-2xl flex items-center justify-center text-white text-2xl font-display font-bold mb-6 shadow-lg">2</div>
                    <div class="mb-4">
                        <img src="https://images.unsplash.com/photo-1516574187841-cb9cc2ca948b?w=400&h=200&fit=crop" class="rounded-xl w-full h-40 object-cover" alt="Book appointment">
                    </div>
                    <h3 class="text-xl font-display font-bold text-gray-900 mb-3">Book Instantly</h3>
                    <p class="text-gray-600 leading-relaxed">Select your preferred time slot and book your appointment online. Get instant confirmation and reminders.</p>
                </div>
                <div class="hidden md:block absolute top-1/2 -right-6 lg:-right-8 z-10">
                    <svg class="w-12 h-12 text-medical-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </div>
            </div>

            <!-- Step 3 -->
            <div data-aos="fade-up" data-aos-delay="300">
                <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 h-full">
                    <div class="w-16 h-16 morphing-bg rounded-2xl flex items-center justify-center text-white text-2xl font-display font-bold mb-6 shadow-lg">3</div>
                    <div class="mb-4">
                        <img src="https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=400&h=200&fit=crop" class="rounded-xl w-full h-40 object-cover" alt="Get care">
                    </div>
                    <h3 class="text-xl font-display font-bold text-gray-900 mb-3">Get Expert Care</h3>
                    <p class="text-gray-600 leading-relaxed">Visit in person or connect via telehealth. Rate your experience and help others find great care.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Doctors Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between mb-12" data-aos="fade-up">
            <div>
                <span class="inline-block px-4 py-1.5 bg-accent-50 text-accent-700 text-sm font-semibold rounded-full border border-accent-200 mb-4">Top Rated</span>
                <h2 class="text-3xl sm:text-4xl font-display font-bold text-gray-900">
                    Featured <span class="gradient-text">Doctors</span>
                </h2>
                <p class="mt-3 text-gray-600">Hand-picked specialists with exceptional patient outcomes</p>
            </div>
            <a href="{{ route('doctors.index') }}" class="mt-4 sm:mt-0 inline-flex items-center text-medical-600 hover:text-medical-700 font-semibold group">
                View All Doctors
                <svg class="w-5 h-5 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($doctors as $index => $doctor)
            <a href="{{ route('doctors.show', $doctor['slug']) }}"
               class="card-hover group bg-white border border-gray-100 rounded-2xl overflow-hidden"
               data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="relative">
                    <img src="{{ $doctor['image'] }}" class="w-full h-56 object-cover" alt="{{ $doctor['name'] }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    @if($doctor['available_today'])
                    <span class="absolute top-3 right-3 px-2.5 py-1 bg-green-500 text-white text-xs font-bold rounded-full shadow-lg">Available Today</span>
                    @endif
                    @if($doctor['verified'])
                    <span class="absolute top-3 left-3 w-7 h-7 bg-blue-500 rounded-full flex items-center justify-center shadow-lg">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    </span>
                    @endif
                </div>
                <div class="p-5">
                    <h3 class="font-display font-bold text-gray-900 group-hover:text-medical-600 transition-colors">{{ $doctor['name'] }}</h3>
                    <p class="text-sm text-medical-600 font-medium mt-1">{{ $doctor['specialty'] }}</p>
                    <p class="text-sm text-gray-500 mt-1">{{ $doctor['hospital'] }}</p>

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
    </div>
</section>

<!-- Large Stats / Impact Section -->
<section class="py-20 morphing-bg relative overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl sm:text-4xl font-display font-bold text-white text-shadow-lg">Our Impact in Numbers</h2>
            <p class="mt-4 text-white/80 max-w-2xl mx-auto">Connecting patients with quality healthcare across the nation</p>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center" data-aos="zoom-in" data-aos-delay="0">
                <div class="text-4xl sm:text-5xl font-display font-extrabold text-white text-shadow-lg" x-data="{ count: 0 }" x-intersect.once="let t=12480,s=Math.ceil(t/60),i=setInterval(()=>{count+=s;if(count>=t){count=t;clearInterval(i)}},30)" x-text="count.toLocaleString()">12,480</div>
                <div class="text-white/70 mt-2 font-medium">Verified Doctors</div>
            </div>
            <div class="text-center" data-aos="zoom-in" data-aos-delay="100">
                <div class="text-4xl sm:text-5xl font-display font-extrabold text-white text-shadow-lg" x-data="{ count: 0 }" x-intersect.once="let t=3250,s=Math.ceil(t/60),i=setInterval(()=>{count+=s;if(count>=t){count=t;clearInterval(i)}},30)" x-text="count.toLocaleString()">3,250</div>
                <div class="text-white/70 mt-2 font-medium">Partner Clinics</div>
            </div>
            <div class="text-center" data-aos="zoom-in" data-aos-delay="200">
                <div class="text-4xl sm:text-5xl font-display font-extrabold text-white text-shadow-lg">2.1M+</div>
                <div class="text-white/70 mt-2 font-medium">Happy Patients</div>
            </div>
            <div class="text-center" data-aos="zoom-in" data-aos-delay="300">
                <div class="text-4xl sm:text-5xl font-display font-extrabold text-white text-shadow-lg">320</div>
                <div class="text-white/70 mt-2 font-medium">Cities Covered</div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Clinics Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between mb-12" data-aos="fade-up">
            <div>
                <span class="inline-block px-4 py-1.5 bg-purple-50 text-purple-700 text-sm font-semibold rounded-full border border-purple-200 mb-4">Featured</span>
                <h2 class="text-3xl sm:text-4xl font-display font-bold text-gray-900">
                    Top-Rated <span class="gradient-text">Clinics</span>
                </h2>
                <p class="mt-3 text-gray-600">Premier healthcare facilities with outstanding patient experiences</p>
            </div>
            <a href="{{ route('clinics.index') }}" class="mt-4 sm:mt-0 inline-flex items-center text-medical-600 hover:text-medical-700 font-semibold group">
                View All Clinics
                <svg class="w-5 h-5 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($clinics as $index => $clinic)
            <a href="{{ route('clinics.show', $clinic['slug']) }}"
               class="card-hover group bg-white rounded-2xl overflow-hidden border border-gray-100"
               data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $clinic['image'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="{{ $clinic['name'] }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <span class="absolute bottom-3 left-3 px-3 py-1 glass-dark text-white text-xs font-medium rounded-full">{{ $clinic['type'] }}</span>
                    @if($clinic['emergency'])
                    <span class="absolute top-3 right-3 px-2.5 py-1 bg-red-500 text-white text-xs font-bold rounded-full shadow-lg flex items-center space-x-1">
                        <span class="w-1.5 h-1.5 bg-white rounded-full pulse-dot"></span>
                        <span>ER</span>
                    </span>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="font-display font-bold text-lg text-gray-900 group-hover:text-medical-600 transition-colors">{{ $clinic['name'] }}</h3>
                    <div class="flex items-center mt-2 text-sm text-gray-500">
                        <i data-lucide="map-pin" class="w-4 h-4 mr-1"></i>
                        {{ $clinic['location'] }}
                    </div>
                    <p class="mt-3 text-sm text-gray-600 line-clamp-2">{{ $clinic['description'] }}</p>

                    <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-50">
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <span class="text-sm font-semibold">{{ $clinic['rating'] }}</span>
                            <span class="text-xs text-gray-400">({{ $clinic['reviews_count'] }})</span>
                        </div>
                        <span class="text-sm text-gray-500">{{ $clinic['doctors_count'] }} doctors</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-block px-4 py-1.5 bg-amber-50 text-amber-700 text-sm font-semibold rounded-full border border-amber-200 mb-4">Testimonials</span>
            <h2 class="text-3xl sm:text-4xl font-display font-bold text-gray-900">
                What Our <span class="gradient-text">Patients Say</span>
            </h2>
        </div>

        <div class="swiper testimonials-carousel" data-aos="fade-up">
            <div class="swiper-wrapper pb-12">
                @foreach($testimonials as $testimonial)
                <div class="swiper-slide">
                    <div class="testimonial-card bg-white border border-gray-100 rounded-2xl p-8 shadow-sm h-full">
                        <div class="flex items-center space-x-1 mb-4">
                            @for($i = 0; $i < $testimonial['rating']; $i++)
                            <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                        <blockquote class="text-gray-700 leading-relaxed mb-6 italic">"{{ $testimonial['text'] }}"</blockquote>
                        <div class="flex items-center space-x-3">
                            <img src="{{ $testimonial['image'] }}" class="w-12 h-12 rounded-full object-cover ring-2 ring-gray-100" alt="{{ $testimonial['name'] }}">
                            <div>
                                <div class="font-semibold text-gray-900">{{ $testimonial['name'] }}</div>
                                <div class="text-sm text-gray-500">{{ $testimonial['location'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- For Healthcare Professionals CTA -->
<section class="py-20 bg-gray-50 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-medical-100 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=600&h=500&fit=crop"
                         class="rounded-3xl shadow-2xl w-full h-[400px] object-cover" alt="Doctor using dashboard">
                    <div class="absolute -bottom-6 -right-6 glass rounded-2xl p-5 shadow-xl">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="trending-up" class="w-6 h-6 text-green-600"></i>
                            </div>
                            <div>
                                <div class="text-2xl font-display font-bold text-gray-900">+340%</div>
                                <div class="text-sm text-gray-500">Patient Reach</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div data-aos="fade-left">
                <span class="inline-block px-4 py-1.5 bg-medical-50 text-medical-700 text-sm font-semibold rounded-full border border-medical-200 mb-4">For Professionals</span>
                <h2 class="text-3xl sm:text-4xl font-display font-bold text-gray-900 mb-6">
                    Grow Your Practice with <span class="gradient-text">Healix</span>
                </h2>
                <p class="text-gray-600 text-lg mb-8 leading-relaxed">Join thousands of healthcare professionals who use Healix to manage their practice, reach new patients, and streamline their workflow.</p>

                <div class="space-y-4 mb-8">
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 mt-0.5 bg-accent-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-3.5 h-3.5 text-accent-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">Professional Dashboard</div>
                            <div class="text-gray-600 text-sm">Manage appointments, patient records, and analytics in one place</div>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 mt-0.5 bg-accent-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-3.5 h-3.5 text-accent-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">Verified Profile</div>
                            <div class="text-gray-600 text-sm">Stand out with a verified badge and detailed professional profile</div>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 mt-0.5 bg-accent-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-3.5 h-3.5 text-accent-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">Telehealth Ready</div>
                            <div class="text-gray-600 text-sm">Built-in video consultation with secure HIPAA-compliant platform</div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('dashboard.index') }}" class="px-8 py-3.5 morphing-bg text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all text-center">
                        View Demo Dashboard
                    </a>
                    <a href="{{ route('register') }}" class="px-8 py-3.5 bg-white text-gray-700 font-semibold rounded-xl border-2 border-gray-200 hover:border-medical-300 hover:text-medical-700 transition-all text-center">
                        Join as Provider
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Medical Images Grid Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl sm:text-4xl font-display font-bold text-gray-900">
                Healthcare <span class="gradient-text">Excellence</span>
            </h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Glimpses into the world-class care delivered by our network</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="row-span-2" data-aos="fade-up" data-aos-delay="0">
                <img src="https://images.unsplash.com/photo-1581595220892-b0739db3ba8c?w=400&h=600&fit=crop" class="w-full h-full object-cover rounded-2xl shadow-lg hover:shadow-xl transition-shadow" alt="Medical professional">
            </div>
            <div data-aos="fade-up" data-aos-delay="100">
                <img src="https://images.unsplash.com/photo-1530497610245-94d3c16cda28?w=400&h=280&fit=crop" class="w-full h-full object-cover rounded-2xl shadow-lg hover:shadow-xl transition-shadow" alt="Medical equipment">
            </div>
            <div data-aos="fade-up" data-aos-delay="150">
                <img src="https://images.unsplash.com/photo-1584820927498-cfe5211fd8bf?w=400&h=280&fit=crop" class="w-full h-full object-cover rounded-2xl shadow-lg hover:shadow-xl transition-shadow" alt="Healthcare technology">
            </div>
            <div class="row-span-2" data-aos="fade-up" data-aos-delay="200">
                <img src="https://images.unsplash.com/photo-1579684453423-f84349ef60b0?w=400&h=600&fit=crop" class="w-full h-full object-cover rounded-2xl shadow-lg hover:shadow-xl transition-shadow" alt="Patient care">
            </div>
            <div data-aos="fade-up" data-aos-delay="250">
                <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?w=400&h=280&fit=crop" class="w-full h-full object-cover rounded-2xl shadow-lg hover:shadow-xl transition-shadow" alt="Consultation">
            </div>
            <div data-aos="fade-up" data-aos-delay="300">
                <img src="https://images.unsplash.com/photo-1559757175-5700dde675bc?w=400&h=280&fit=crop" class="w-full h-full object-cover rounded-2xl shadow-lg hover:shadow-xl transition-shadow" alt="Modern clinic">
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 relative overflow-hidden">
    <div class="absolute inset-0 morphing-bg"></div>
    <div class="absolute inset-0 bg-black/30"></div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-white text-shadow-lg mb-6" data-aos="fade-up">
            Ready to Take Control<br>of Your Health?
        </h2>
        <p class="text-xl text-white/80 mb-10 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Join millions of patients who trust Healix to find the best healthcare professionals.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('doctors.index') }}" class="px-8 py-4 bg-white text-gray-900 font-bold rounded-xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all text-lg">
                Find a Doctor
            </a>
            <a href="{{ route('register') }}" class="px-8 py-4 bg-white/10 text-white font-bold rounded-xl border-2 border-white/30 hover:bg-white/20 transition-all text-lg backdrop-blur-sm">
                Create Free Account
            </a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-gray-300 pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-12">
            <div class="col-span-2 md:col-span-1">
                <div class="flex items-center space-x-2 mb-4">
                    <div class="w-10 h-10 morphing-bg rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C9 2 7 4.5 7 7s2 5 5 8c3-3 5-5.5 5-8s-2-5-5-5zm0 18c-3-3-5-5.5-5-8s2-5 5-5 5 2.5 5 5-2 5-5 8z" fill-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-xl font-display font-bold text-white">Healix</span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">The intelligent healthcare discovery platform connecting patients with world-class medical professionals.</p>
            </div>

            <div>
                <h4 class="font-display font-semibold text-white mb-4">For Patients</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('doctors.index') }}" class="hover:text-white transition-colors">Find Doctors</a></li>
                    <li><a href="{{ route('clinics.index') }}" class="hover:text-white transition-colors">Browse Clinics</a></li>
                    <li><a href="#specialties" class="hover:text-white transition-colors">Specialties</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Telehealth</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-display font-semibold text-white mb-4">For Providers</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('dashboard.index') }}" class="hover:text-white transition-colors">Provider Dashboard</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-white transition-colors">Join Network</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Resources</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">API</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-display font-semibold text-white mb-4">Company</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Careers</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="{{ route('admin.index') }}" class="hover:text-white transition-colors">Admin Panel</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8 flex flex-col sm:flex-row justify-between items-center">
            <p class="text-sm text-gray-500">&copy; {{ date('Y') }} Healix. All rights reserved.</p>
            <div class="flex space-x-4 mt-4 sm:mt-0">
                <a href="#" class="text-gray-500 hover:text-white transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                <a href="#" class="text-gray-500 hover:text-white transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.6.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg></a>
                <a href="#" class="text-gray-500 hover:text-white transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></a>
            </div>
        </div>
    </div>
</footer>
@endsection

@section('scripts')
<script>
    // Medical Carousel
    new Swiper('.medical-carousel', {
        loop: true,
        autoplay: { delay: 4000, disableOnInteraction: false },
        effect: 'fade',
        fadeEffect: { crossFade: true },
        pagination: { el: '.medical-carousel .swiper-pagination', clickable: true },
        navigation: {
            nextEl: '.medical-carousel .swiper-button-next',
            prevEl: '.medical-carousel .swiper-button-prev',
        },
    });

    // Testimonials Carousel
    new Swiper('.testimonials-carousel', {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        autoplay: { delay: 5000, disableOnInteraction: false },
        pagination: { el: '.testimonials-carousel .swiper-pagination', clickable: true },
        breakpoints: {
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });
</script>
@endsection
