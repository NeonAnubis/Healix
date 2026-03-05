@extends('layouts.app')
@section('title', 'Manage Doctors')
@section('content')
@include('admin.partials.sidebar')
<main class="ml-64 min-h-screen bg-slate-50">
    <header class="bg-white border-b border-gray-100 px-8 py-4 flex items-center justify-between">
        <h1 class="text-xl font-display font-bold text-gray-900">Doctor Management</h1>
        <div class="flex items-center space-x-3">
            <div class="flex items-center px-4 py-2 bg-gray-100 rounded-xl"><i data-lucide="search" class="w-4 h-4 text-gray-400 mr-2"></i><input type="text" placeholder="Search doctors..." class="bg-transparent text-sm focus:outline-none w-48"></div>
            <button class="px-4 py-2.5 morphing-bg text-white font-semibold rounded-xl text-sm">Add Doctor</button>
        </div>
    </header>
    <div class="p-8">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <table class="w-full">
                <thead><tr class="bg-gray-50 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                    <th class="px-6 py-4">Doctor</th><th class="px-6 py-4">Specialty</th><th class="px-6 py-4">Location</th><th class="px-6 py-4">Rating</th><th class="px-6 py-4">Status</th><th class="px-6 py-4">Actions</th>
                </tr></thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($doctors as $doc)
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-6 py-4"><div class="flex items-center space-x-3"><img src="{{ $doc['image'] }}" class="w-10 h-10 rounded-full object-cover"><div><p class="font-medium text-gray-900 text-sm">{{ $doc['name'] }}</p><p class="text-xs text-gray-500">{{ $doc['education'] }}</p></div></div></td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $doc['specialty'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $doc['location'] }}</td>
                        <td class="px-6 py-4"><div class="flex items-center space-x-1"><svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg><span class="text-sm font-semibold">{{ $doc['rating'] }}</span></div></td>
                        <td class="px-6 py-4">@if($doc['verified'])<span class="px-2.5 py-1 bg-green-50 text-green-700 text-xs font-medium rounded-full">Verified</span>@else<span class="px-2.5 py-1 bg-yellow-50 text-yellow-700 text-xs font-medium rounded-full">Pending</span>@endif</td>
                        <td class="px-6 py-4 flex space-x-2"><button class="p-1.5 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-blue-50"><i data-lucide="eye" class="w-4 h-4"></i></button><button class="p-1.5 text-gray-400 hover:text-amber-600 rounded-lg hover:bg-amber-50"><i data-lucide="pencil" class="w-4 h-4"></i></button><button class="p-1.5 text-gray-400 hover:text-red-600 rounded-lg hover:bg-red-50"><i data-lucide="trash-2" class="w-4 h-4"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
