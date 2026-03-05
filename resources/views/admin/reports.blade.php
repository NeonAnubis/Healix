@extends('layouts.app')
@section('title', 'Reports')
@section('content')
@include('admin.partials.sidebar')
<main class="ml-64 min-h-screen bg-slate-50">
    <header class="bg-white border-b border-gray-100 px-8 py-4 flex items-center justify-between">
        <h1 class="text-xl font-display font-bold text-gray-900">Reports & Analytics</h1>
        <button class="px-4 py-2.5 border border-gray-200 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 flex items-center space-x-2"><i data-lucide="download" class="w-4 h-4"></i><span>Export All</span></button>
    </header>
    <div class="p-8">
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 hover:shadow-md transition-shadow cursor-pointer">
                <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center mb-4"><i data-lucide="dollar-sign" class="w-6 h-6 text-green-500"></i></div>
                <h3 class="font-display font-bold text-gray-900">Revenue Report</h3>
                <p class="text-sm text-gray-500 mt-1">Detailed revenue breakdown by source</p>
                <button class="mt-4 text-sm text-medical-600 hover:underline font-medium flex items-center"><span>Download PDF</span><i data-lucide="download" class="w-3.5 h-3.5 ml-1"></i></button>
            </div>
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 hover:shadow-md transition-shadow cursor-pointer">
                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mb-4"><i data-lucide="users" class="w-6 h-6 text-blue-500"></i></div>
                <h3 class="font-display font-bold text-gray-900">User Analytics</h3>
                <p class="text-sm text-gray-500 mt-1">User growth and engagement metrics</p>
                <button class="mt-4 text-sm text-medical-600 hover:underline font-medium flex items-center"><span>Download PDF</span><i data-lucide="download" class="w-3.5 h-3.5 ml-1"></i></button>
            </div>
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 hover:shadow-md transition-shadow cursor-pointer">
                <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center mb-4"><i data-lucide="calendar" class="w-6 h-6 text-purple-500"></i></div>
                <h3 class="font-display font-bold text-gray-900">Appointment Report</h3>
                <p class="text-sm text-gray-500 mt-1">Booking trends and specialty demand</p>
                <button class="mt-4 text-sm text-medical-600 hover:underline font-medium flex items-center"><span>Download PDF</span><i data-lucide="download" class="w-3.5 h-3.5 ml-1"></i></button>
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <h3 class="font-display font-bold text-gray-900 mb-6">Revenue Trend (6 Months)</h3>
            <canvas id="reportRevenueChart" height="300"></canvas>
        </div>
    </div>
</main>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('reportRevenueChart'), {
    type: 'line',
    data: {
        labels: @json(array_column($stats['monthly_revenue'], 'month')),
        datasets: [{
            label: 'Revenue ($)',
            data: @json(array_column($stats['monthly_revenue'], 'revenue')),
            borderColor: '#14b8a6', backgroundColor: 'rgba(20,184,166,0.1)',
            fill: true, tension: 0.4, borderWidth: 3, pointRadius: 5,
        }]
    },
    options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, ticks: { callback: v => '$' + (v/1000) + 'K' } } } }
});
</script>
@endsection
