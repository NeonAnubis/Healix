@extends('layouts.app')
@section('title', 'Appointments')
@section('content')
@include('dashboard.partials.sidebar')
<main class="ml-64 min-h-screen bg-gray-50">
    <header class="bg-white border-b border-gray-100 px-8 py-4 flex items-center justify-between">
        <h1 class="text-xl font-display font-bold text-gray-900">Appointments</h1>
        <button class="px-4 py-2.5 morphing-bg text-white font-semibold rounded-xl text-sm flex items-center space-x-2"><i data-lucide="plus" class="w-4 h-4"></i><span>New Appointment</span></button>
    </header>
    <div class="p-8" x-data="{ filter: 'all' }">
        <div class="flex flex-wrap gap-2 mb-6">
            <button @click="filter='all'" :class="filter==='all' ? 'bg-medical-50 text-medical-700 border-medical-200' : 'bg-white text-gray-600 border-gray-200'" class="px-4 py-2 rounded-xl text-sm font-medium border transition-colors">All ({{ count($stats['upcoming_appointments']) }})</button>
            <button @click="filter='confirmed'" :class="filter==='confirmed' ? 'bg-green-50 text-green-700 border-green-200' : 'bg-white text-gray-600 border-gray-200'" class="px-4 py-2 rounded-xl text-sm font-medium border transition-colors">Confirmed</button>
            <button @click="filter='pending'" :class="filter==='pending' ? 'bg-yellow-50 text-yellow-700 border-yellow-200' : 'bg-white text-gray-600 border-gray-200'" class="px-4 py-2 rounded-xl text-sm font-medium border transition-colors">Pending</button>
            <button @click="filter='cancelled'" :class="filter==='cancelled' ? 'bg-red-50 text-red-700 border-red-200' : 'bg-white text-gray-600 border-gray-200'" class="px-4 py-2 rounded-xl text-sm font-medium border transition-colors">Cancelled</button>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead><tr class="bg-gray-50 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <th class="px-6 py-4">Patient</th><th class="px-6 py-4">Time</th><th class="px-6 py-4">Type</th><th class="px-6 py-4">Status</th><th class="px-6 py-4">Actions</th>
                    </tr></thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($stats['upcoming_appointments'] as $apt)
                        <tr class="hover:bg-gray-50/50" x-show="filter==='all' || filter==='{{ $apt['status'] }}'">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-9 h-9 bg-gray-100 rounded-full flex items-center justify-center font-semibold text-gray-600 text-sm">{{ substr($apt['patient'], 0, 1) }}</div>
                                    <span class="font-medium text-gray-900 text-sm">{{ $apt['patient'] }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $apt['time'] }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $apt['type'] }}</td>
                            <td class="px-6 py-4">
                                @php $colors = ['confirmed'=>'green','pending'=>'yellow','cancelled'=>'red']; $c = $colors[$apt['status']] ?? 'gray'; @endphp
                                <span class="px-2.5 py-1 bg-{{ $c }}-50 text-{{ $c }}-700 text-xs font-medium rounded-full capitalize">{{ $apt['status'] }}</span>
                            </td>
                            <td class="px-6 py-4"><button class="text-sm text-medical-600 hover:underline font-medium">View</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
