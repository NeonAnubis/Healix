@extends('layouts.app')
@section('title', 'Admin Dashboard')

@section('styles')
.admin-gradient { background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); }
.chart-card { border-left: 4px solid transparent; transition: border-color 0.3s; }
.chart-card:hover { border-left-color: #14b8a6; }
@endsection

@section('content')
@include('admin.partials.sidebar')

<main class="ml-64 min-h-screen bg-slate-50">
    <!-- Top Bar -->
    <header class="bg-white border-b border-gray-100 px-8 py-4 flex items-center justify-between sticky top-0 z-30">
        <div class="flex items-center space-x-4">
            <div class="flex items-center px-4 py-2.5 bg-gray-100 rounded-xl w-80"><i data-lucide="search" class="w-4 h-4 text-gray-400 mr-3"></i><input type="text" placeholder="Search anything..." class="bg-transparent text-sm focus:outline-none w-full"></div>
        </div>
        <div class="flex items-center space-x-4">
            <button class="relative p-2.5 text-gray-400 hover:text-gray-600 rounded-xl hover:bg-gray-100"><i data-lucide="bell" class="w-5 h-5"></i><span class="absolute top-1.5 right-1.5 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span></button>
            <button class="relative p-2.5 text-gray-400 hover:text-gray-600 rounded-xl hover:bg-gray-100"><i data-lucide="mail" class="w-5 h-5"></i><span class="absolute top-1.5 right-1.5 w-2 h-2 bg-blue-500 rounded-full border-2 border-white"></span></button>
            <div class="w-px h-8 bg-gray-200"></div>
            <div class="flex items-center space-x-2"><div class="w-9 h-9 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-bold text-sm">AD</div><span class="text-sm font-medium text-gray-700">Admin</span></div>
        </div>
    </header>

    <div class="p-8">
        <!-- Welcome Banner -->
        <div class="bg-gradient-to-r from-slate-800 to-slate-900 rounded-2xl p-8 mb-8 text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-medical-500/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-1/3 w-48 h-48 bg-purple-500/10 rounded-full translate-y-1/2"></div>
            <div class="relative">
                <h2 class="text-2xl font-display font-bold">Welcome back, Admin</h2>
                <p class="text-slate-300 mt-1">Here's what's happening with Healix today.</p>
                <div class="flex items-center space-x-6 mt-4">
                    <div class="flex items-center space-x-2 text-sm"><span class="w-2 h-2 bg-green-400 rounded-full pulse-dot"></span><span class="text-slate-300">Platform Status: <span class="text-green-400 font-semibold">Healthy</span></span></div>
                    <div class="text-sm text-slate-300">Uptime: <span class="text-white font-semibold">{{ $stats['platform_health']['uptime'] }}</span></div>
                    <div class="text-sm text-slate-300">Active Sessions: <span class="text-white font-semibold">{{ number_format($stats['platform_health']['active_sessions']) }}</span></div>
                </div>
            </div>
        </div>

        <!-- Stat Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm chart-card">
                <div class="flex items-center justify-between mb-3"><div class="w-11 h-11 bg-green-50 rounded-xl flex items-center justify-center"><i data-lucide="dollar-sign" class="w-5 h-5 text-green-500"></i></div><span class="flex items-center text-xs font-semibold text-green-600"><i data-lucide="trending-up" class="w-3 h-3 mr-1"></i>+18.2%</span></div>
                <div class="text-2xl font-display font-bold text-gray-900">$67.5K</div>
                <div class="text-sm text-gray-500">Total Revenue</div>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm chart-card">
                <div class="flex items-center justify-between mb-3"><div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center"><i data-lucide="stethoscope" class="w-5 h-5 text-blue-500"></i></div><span class="flex items-center text-xs font-semibold text-green-600"><i data-lucide="trending-up" class="w-3 h-3 mr-1"></i>+150</span></div>
                <div class="text-2xl font-display font-bold text-gray-900">1,580</div>
                <div class="text-sm text-gray-500">Active Doctors</div>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm chart-card">
                <div class="flex items-center justify-between mb-3"><div class="w-11 h-11 bg-purple-50 rounded-xl flex items-center justify-center"><i data-lucide="users" class="w-5 h-5 text-purple-500"></i></div><span class="flex items-center text-xs font-semibold text-green-600"><i data-lucide="trending-up" class="w-3 h-3 mr-1"></i>+23.4%</span></div>
                <div class="text-2xl font-display font-bold text-gray-900">38.5K</div>
                <div class="text-sm text-gray-500">Total Patients</div>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm chart-card">
                <div class="flex items-center justify-between mb-3"><div class="w-11 h-11 bg-amber-50 rounded-xl flex items-center justify-center"><i data-lucide="calendar-check" class="w-5 h-5 text-amber-500"></i></div><span class="flex items-center text-xs font-semibold text-green-600"><i data-lucide="trending-up" class="w-3 h-3 mr-1"></i>+12.8%</span></div>
                <div class="text-2xl font-display font-bold text-gray-900">28.4K</div>
                <div class="text-sm text-gray-500">Monthly Appointments</div>
            </div>
        </div>

        <!-- Charts Row 1 -->
        <div class="grid lg:grid-cols-2 gap-8 mb-8">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 chart-card">
                <div class="flex items-center justify-between mb-6">
                    <div><h3 class="font-display font-bold text-gray-900">Revenue Overview</h3><p class="text-sm text-gray-500">Monthly revenue trend</p></div>
                    <select class="px-3 py-1.5 border border-gray-200 rounded-lg text-sm text-gray-600"><option>Last 6 Months</option></select>
                </div>
                <canvas id="revenueChart" height="280"></canvas>
            </div>
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 chart-card">
                <div class="flex items-center justify-between mb-6">
                    <div><h3 class="font-display font-bold text-gray-900">User Growth</h3><p class="text-sm text-gray-500">Patients vs Doctors</p></div>
                </div>
                <canvas id="userGrowthChart" height="280"></canvas>
            </div>
        </div>

        <!-- Charts Row 2 -->
        <div class="grid lg:grid-cols-3 gap-8 mb-8">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 chart-card">
                <h3 class="font-display font-bold text-gray-900 mb-4">Appointments by Specialty</h3>
                <canvas id="specialtyChart" height="280"></canvas>
            </div>
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 chart-card">
                <h3 class="font-display font-bold text-gray-900 mb-4">Top Cities</h3>
                <canvas id="citiesChart" height="280"></canvas>
            </div>
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <h3 class="font-display font-bold text-gray-900 mb-4">Platform Health</h3>
                <div class="space-y-4">
                    <div class="p-4 bg-green-50 rounded-xl"><div class="flex items-center justify-between"><span class="text-sm font-medium text-gray-700">Uptime</span><span class="text-lg font-bold text-green-600">{{ $stats['platform_health']['uptime'] }}</span></div></div>
                    <div class="p-4 bg-blue-50 rounded-xl"><div class="flex items-center justify-between"><span class="text-sm font-medium text-gray-700">Avg Response</span><span class="text-lg font-bold text-blue-600">{{ $stats['platform_health']['avg_response'] }}</span></div></div>
                    <div class="p-4 bg-purple-50 rounded-xl"><div class="flex items-center justify-between"><span class="text-sm font-medium text-gray-700">Error Rate</span><span class="text-lg font-bold text-purple-600">{{ $stats['platform_health']['error_rate'] }}</span></div></div>
                    <div class="p-4 bg-amber-50 rounded-xl"><div class="flex items-center justify-between"><span class="text-sm font-medium text-gray-700">Active Sessions</span><span class="text-lg font-bold text-amber-600">{{ number_format($stats['platform_health']['active_sessions']) }}</span></div></div>
                </div>
            </div>
        </div>

        <!-- Recent Registrations -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">
            <div class="p-6 border-b border-gray-50 flex items-center justify-between">
                <h3 class="font-display font-bold text-gray-900">Recent Doctor Registrations</h3>
                <a href="{{ route('admin.doctors') }}" class="text-sm text-medical-600 hover:underline font-medium">View All</a>
            </div>
            <table class="w-full">
                <thead><tr class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-50"><th class="px-6 py-3">Doctor</th><th class="px-6 py-3">Specialty</th><th class="px-6 py-3">Date</th><th class="px-6 py-3">Status</th><th class="px-6 py-3">Actions</th></tr></thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($stats['recent_registrations'] as $reg)
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-6 py-4 font-medium text-gray-900 text-sm">{{ $reg['name'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $reg['specialty'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $reg['date'] }}</td>
                        <td class="px-6 py-4">
                            @php $sc = ['approved'=>'green','pending'=>'yellow','rejected'=>'red']; $c=$sc[$reg['status']]??'gray'; @endphp
                            <span class="px-2.5 py-1 bg-{{ $c }}-50 text-{{ $c }}-700 text-xs font-medium rounded-full capitalize">{{ $reg['status'] }}</span>
                        </td>
                        <td class="px-6 py-4"><button class="text-sm text-medical-600 hover:underline">Review</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const revenueData = @json($stats['monthly_revenue']);
const userData = @json($stats['user_growth']);
const specialtyData = @json($stats['appointments_by_specialty']);
const cityData = @json($stats['top_cities']);

// Revenue Chart
new Chart(document.getElementById('revenueChart'), {
    type: 'line',
    data: {
        labels: revenueData.map(d => d.month),
        datasets: [{
            label: 'Revenue ($)',
            data: revenueData.map(d => d.revenue),
            borderColor: '#14b8a6',
            backgroundColor: 'rgba(20, 184, 166, 0.1)',
            fill: true,
            tension: 0.4,
            borderWidth: 3,
            pointBackgroundColor: '#14b8a6',
            pointRadius: 5,
            pointHoverRadius: 8,
        }]
    },
    options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, grid: { color: '#f1f5f9' }, ticks: { callback: v => '$' + (v/1000) + 'K' } }, x: { grid: { display: false } } } }
});

// User Growth Chart
new Chart(document.getElementById('userGrowthChart'), {
    type: 'bar',
    data: {
        labels: userData.map(d => d.month),
        datasets: [
            { label: 'Patients', data: userData.map(d => d.patients), backgroundColor: '#3b82f6', borderRadius: 6 },
            { label: 'Doctors', data: userData.map(d => d.doctors), backgroundColor: '#14b8a6', borderRadius: 6 },
        ]
    },
    options: { responsive: true, plugins: { legend: { position: 'bottom' } }, scales: { y: { beginAtZero: true, grid: { color: '#f1f5f9' } }, x: { grid: { display: false } } } }
});

// Specialty Doughnut
new Chart(document.getElementById('specialtyChart'), {
    type: 'doughnut',
    data: {
        labels: specialtyData.map(d => d.specialty),
        datasets: [{
            data: specialtyData.map(d => d.count),
            backgroundColor: ['#ef4444','#8b5cf6','#f59e0b','#10b981','#3b82f6','#ec4899','#6366f1'],
            borderWidth: 0,
        }]
    },
    options: { responsive: true, plugins: { legend: { position: 'bottom', labels: { boxWidth: 12, padding: 12 } } }, cutout: '60%' }
});

// Top Cities Horizontal Bar
new Chart(document.getElementById('citiesChart'), {
    type: 'bar',
    data: {
        labels: cityData.map(d => d.city),
        datasets: [{
            label: 'Appointments',
            data: cityData.map(d => d.appointments),
            backgroundColor: ['#14b8a6','#3b82f6','#8b5cf6','#f59e0b','#ef4444'],
            borderRadius: 6,
        }]
    },
    options: { indexAxis: 'y', responsive: true, plugins: { legend: { display: false } }, scales: { x: { grid: { color: '#f1f5f9' } }, y: { grid: { display: false } } } }
});
</script>
@endsection
