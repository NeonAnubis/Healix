@extends('layouts.app')
@section('title', 'Patients')
@section('content')
@include('dashboard.partials.sidebar')
<main class="ml-64 min-h-screen bg-gray-50">
    <header class="bg-white border-b border-gray-100 px-8 py-4 flex items-center justify-between">
        <h1 class="text-xl font-display font-bold text-gray-900">Patients</h1>
        <div class="flex items-center space-x-3">
            <div class="flex items-center px-4 py-2 bg-gray-100 rounded-xl"><i data-lucide="search" class="w-4 h-4 text-gray-400 mr-2"></i><input type="text" placeholder="Search patients..." class="bg-transparent text-sm focus:outline-none w-48"></div>
        </div>
    </header>
    <div class="p-8">
        @php
        $patients = [
            ['name'=>'John Mitchell','age'=>45,'gender'=>'Male','last_visit'=>'Mar 5, 2026','condition'=>'Hypertension','phone'=>'(555) 123-4567','visits'=>12],
            ['name'=>'Sarah Kim','age'=>32,'gender'=>'Female','last_visit'=>'Mar 5, 2026','condition'=>'Annual Checkup','phone'=>'(555) 234-5678','visits'=>3],
            ['name'=>'Robert Davis','age'=>58,'gender'=>'Male','last_visit'=>'Mar 3, 2026','condition'=>'Atrial Fibrillation','phone'=>'(555) 345-6789','visits'=>8],
            ['name'=>'Emily Brown','age'=>28,'gender'=>'Female','last_visit'=>'Mar 1, 2026','condition'=>'Chest Pain Evaluation','phone'=>'(555) 456-7890','visits'=>2],
            ['name'=>'Michael Johnson','age'=>67,'gender'=>'Male','last_visit'=>'Feb 28, 2026','condition'=>'Heart Failure Management','phone'=>'(555) 567-8901','visits'=>15],
            ['name'=>'Lisa Anderson','age'=>41,'gender'=>'Female','last_visit'=>'Feb 25, 2026','condition'=>'Palpitations','phone'=>'(555) 678-9012','visits'=>5],
            ['name'=>'James Wilson','age'=>53,'gender'=>'Male','last_visit'=>'Feb 22, 2026','condition'=>'Post-Surgery Follow-up','phone'=>'(555) 789-0123','visits'=>7],
            ['name'=>'Anna Taylor','age'=>36,'gender'=>'Female','last_visit'=>'Feb 20, 2026','condition'=>'High Cholesterol','phone'=>'(555) 890-1234','visits'=>4],
            ['name'=>'William Chen','age'=>49,'gender'=>'Male','last_visit'=>'Feb 18, 2026','condition'=>'Coronary Artery Disease','phone'=>'(555) 901-2345','visits'=>11],
            ['name'=>'Diana Martinez','age'=>55,'gender'=>'Female','last_visit'=>'Feb 15, 2026','condition'=>'Valve Disorder','phone'=>'(555) 012-3456','visits'=>9],
        ];
        @endphp

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <table class="w-full">
                <thead><tr class="bg-gray-50 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                    <th class="px-6 py-4">Patient</th><th class="px-6 py-4">Age/Gender</th><th class="px-6 py-4">Condition</th><th class="px-6 py-4">Last Visit</th><th class="px-6 py-4">Total Visits</th><th class="px-6 py-4">Actions</th>
                </tr></thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($patients as $p)
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-6 py-4"><div class="flex items-center space-x-3"><div class="w-9 h-9 bg-medical-50 rounded-full flex items-center justify-center font-semibold text-medical-600 text-sm">{{ substr($p['name'],0,1) }}</div><div><p class="font-medium text-gray-900 text-sm">{{ $p['name'] }}</p><p class="text-xs text-gray-500">{{ $p['phone'] }}</p></div></div></td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $p['age'] }} / {{ $p['gender'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $p['condition'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $p['last_visit'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $p['visits'] }}</td>
                        <td class="px-6 py-4"><button class="text-sm text-medical-600 hover:underline font-medium">View Record</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
