@extends('layouts.app')
@section('title', 'Doctor Dashboard')
@section('content')
@include('dashboard.partials.sidebar')

<main class="ml-64 min-h-screen bg-gray-50">
    <!-- Top Bar -->
    <header class="bg-white border-b border-gray-100 px-8 py-4 flex items-center justify-between sticky top-0 z-30">
        <div>
            <h1 class="text-xl font-display font-bold text-gray-900">Good morning, {{ explode(' ', $doctor['name'])[1] ?? 'Doctor' }}</h1>
            <p class="text-sm text-gray-500">{{ date('l, F j, Y') }}</p>
        </div>
        <div class="flex items-center space-x-4">
            <button class="relative p-2 text-gray-400 hover:text-gray-600 rounded-xl hover:bg-gray-100">
                <i data-lucide="bell" class="w-5 h-5"></i>
                <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
            </button>
            <button class="p-2 text-gray-400 hover:text-gray-600 rounded-xl hover:bg-gray-100"><i data-lucide="settings" class="w-5 h-5"></i></button>
        </div>
    </header>

    <div class="p-8">
        <!-- Stat Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center"><i data-lucide="calendar-check" class="w-6 h-6 text-blue-500"></i></div>
                    <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">Today</span>
                </div>
                <div class="text-3xl font-display font-bold text-gray-900">{{ $stats['appointments_today'] }}</div>
                <div class="text-sm text-gray-500 mt-1">Today's Appointments</div>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center"><i data-lucide="calendar-range" class="w-6 h-6 text-purple-500"></i></div>
                    <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">This Week</span>
                </div>
                <div class="text-3xl font-display font-bold text-gray-900">{{ $stats['appointments_week'] }}</div>
                <div class="text-sm text-gray-500 mt-1">Weekly Appointments</div>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center"><i data-lucide="users" class="w-6 h-6 text-green-500"></i></div>
                    <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">+{{ $stats['new_patients_month'] }}</span>
                </div>
                <div class="text-3xl font-display font-bold text-gray-900">{{ number_format($stats['total_patients']) }}</div>
                <div class="text-sm text-gray-500 mt-1">Total Patients</div>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center"><i data-lucide="dollar-sign" class="w-6 h-6 text-amber-500"></i></div>
                    <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">+{{ $stats['revenue_change'] }}%</span>
                </div>
                <div class="text-3xl font-display font-bold text-gray-900">${{ number_format($stats['revenue_month'] / 1000, 1) }}K</div>
                <div class="text-sm text-gray-500 mt-1">Monthly Revenue</div>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Today's Schedule -->
            <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-100 shadow-sm">
                <div class="p-6 border-b border-gray-50 flex items-center justify-between">
                    <h2 class="font-display font-bold text-gray-900">Today's Schedule</h2>
                    <a href="{{ route('dashboard.appointments') }}" class="text-sm text-medical-600 hover:underline font-medium">View All</a>
                </div>
                <div class="divide-y divide-gray-50">
                    @foreach($stats['upcoming_appointments'] as $apt)
                    <div class="px-6 py-4 flex items-center justify-between hover:bg-gray-50/50 transition-colors">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center font-semibold text-gray-600 text-sm">{{ substr($apt['patient'], 0, 1) }}</div>
                            <div>
                                <p class="font-semibold text-gray-900 text-sm">{{ $apt['patient'] }}</p>
                                <p class="text-xs text-gray-500">{{ $apt['type'] }}</p>
                            </div>
                        </div>
                        <div class="text-right flex items-center space-x-4">
                            <span class="text-sm font-medium text-gray-700">{{ $apt['time'] }}</span>
                            @php $colors = ['confirmed'=>'green','pending'=>'yellow','cancelled'=>'red']; $c = $colors[$apt['status']] ?? 'gray'; @endphp
                            <span class="px-2.5 py-1 bg-{{ $c }}-50 text-{{ $c }}-700 text-xs font-medium rounded-full capitalize">{{ $apt['status'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Quick Actions & Charts -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                    <h2 class="font-display font-bold text-gray-900 mb-4">Quick Actions</h2>
                    <div class="space-y-2">
                        <button class="w-full flex items-center space-x-3 px-4 py-3 bg-medical-50 text-medical-700 rounded-xl hover:bg-medical-100 transition-colors text-sm font-medium">
                            <i data-lucide="plus-circle" class="w-5 h-5"></i><span>New Appointment</span>
                        </button>
                        <button class="w-full flex items-center space-x-3 px-4 py-3 bg-gray-50 text-gray-700 rounded-xl hover:bg-gray-100 transition-colors text-sm font-medium">
                            <i data-lucide="calendar" class="w-5 h-5"></i><span>View Calendar</span>
                        </button>
                        <button class="w-full flex items-center space-x-3 px-4 py-3 bg-gray-50 text-gray-700 rounded-xl hover:bg-gray-100 transition-colors text-sm font-medium">
                            <i data-lucide="message-square" class="w-5 h-5"></i><span>Messages (3 new)</span>
                        </button>
                    </div>
                </div>

                <!-- Weekly Chart -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                    <h2 class="font-display font-bold text-gray-900 mb-4">Weekly Appointments</h2>
                    <canvas id="weeklyChart" height="200"></canvas>
                </div>
            </div>
        </div>

        <!-- Patient Demographics -->
        <div class="grid lg:grid-cols-2 gap-8 mt-8">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <h2 class="font-display font-bold text-gray-900 mb-4">Patient Demographics</h2>
                <canvas id="demographicsChart" height="250"></canvas>
            </div>
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <h2 class="font-display font-bold text-gray-900 mb-4">Profile Performance</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                        <div class="flex items-center space-x-3"><i data-lucide="eye" class="w-5 h-5 text-blue-500"></i><span class="text-sm font-medium text-gray-700">Profile Views</span></div>
                        <div class="text-right"><span class="font-bold text-gray-900">{{ number_format($stats['profile_views']) }}</span><span class="text-xs text-green-600 ml-2">+{{ $stats['profile_views_change'] }}%</span></div>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                        <div class="flex items-center space-x-3"><i data-lucide="star" class="w-5 h-5 text-amber-500"></i><span class="text-sm font-medium text-gray-700">Average Rating</span></div>
                        <div class="text-right"><span class="font-bold text-gray-900">{{ $doctor['rating'] }}</span><span class="text-xs text-gray-500 ml-2">/ 5.0</span></div>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                        <div class="flex items-center space-x-3"><i data-lucide="message-circle" class="w-5 h-5 text-purple-500"></i><span class="text-sm font-medium text-gray-700">Pending Reviews</span></div>
                        <span class="font-bold text-gray-900">{{ $stats['pending_reviews'] }}</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                        <div class="flex items-center space-x-3"><i data-lucide="user-plus" class="w-5 h-5 text-green-500"></i><span class="text-sm font-medium text-gray-700">New Patients (Month)</span></div>
                        <span class="font-bold text-gray-900">{{ $stats['new_patients_month'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('weeklyChart'), {
    type: 'bar',
    data: {
        labels: {!! json_encode(array_column($stats['weekly_appointments'], 'day')) !!},
        datasets: [{
            label: 'Appointments',
            data: {!! json_encode(array_column($stats['weekly_appointments'], 'count')) !!},
            backgroundColor: 'rgba(13, 148, 136, 0.2)',
            borderColor: 'rgba(13, 148, 136, 1)',
            borderWidth: 2,
            borderRadius: 8,
        }]
    },
    options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, grid: { display: false } }, x: { grid: { display: false } } } }
});

new Chart(document.getElementById('demographicsChart'), {
    type: 'doughnut',
    data: {
        labels: {!! json_encode(array_column($stats['patient_demographics'], 'age_group')) !!},
        datasets: [{
            data: {!! json_encode(array_column($stats['patient_demographics'], 'percentage')) !!},
            backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#8b5cf6', '#ef4444'],
            borderWidth: 0,
        }]
    },
    options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
});
</script>
@endsection
