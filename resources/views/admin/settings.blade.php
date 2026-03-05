@extends('layouts.app')
@section('title', 'Settings')
@section('content')
@include('admin.partials.sidebar')
<main class="ml-64 min-h-screen bg-slate-50">
    <header class="bg-white border-b border-gray-100 px-8 py-4"><h1 class="text-xl font-display font-bold text-gray-900">Platform Settings</h1></header>
    <div class="p-8 max-w-4xl space-y-6">
        <!-- General Settings -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <h2 class="font-display font-bold text-gray-900 mb-6">General Settings</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div><label class="block text-sm font-semibold text-gray-700 mb-1.5">Platform Name</label><input type="text" value="Healix" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 outline-none"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-1.5">Support Email</label><input type="email" value="support@healix.com" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 outline-none"></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-1.5">Default Currency</label><select class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm"><option>USD ($)</option><option>EUR</option><option>GBP</option></select></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-1.5">Timezone</label><select class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm"><option>America/New_York (EST)</option><option>America/Chicago (CST)</option><option>America/Los_Angeles (PST)</option></select></div>
            </div>
            <div class="mt-6 space-y-4">
                <label class="flex items-center justify-between p-4 bg-gray-50 rounded-xl cursor-pointer"><div><span class="font-medium text-gray-900 text-sm">Enable Registration</span><p class="text-xs text-gray-500">Allow new users to register</p></div><div class="relative" x-data="{ on: true }"><input type="checkbox" class="sr-only" @click="on=!on"><div class="w-10 h-6 rounded-full transition-colors" :class="on?'bg-medical-500':'bg-gray-200'"></div><div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform" :class="on?'translate-x-4':''"></div></div></label>
                <label class="flex items-center justify-between p-4 bg-gray-50 rounded-xl cursor-pointer"><div><span class="font-medium text-gray-900 text-sm">Maintenance Mode</span><p class="text-xs text-gray-500">Show maintenance page to users</p></div><div class="relative" x-data="{ on: false }"><input type="checkbox" class="sr-only" @click="on=!on"><div class="w-10 h-6 rounded-full transition-colors" :class="on?'bg-medical-500':'bg-gray-200'"></div><div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform" :class="on?'translate-x-4':''"></div></div></label>
                <label class="flex items-center justify-between p-4 bg-gray-50 rounded-xl cursor-pointer"><div><span class="font-medium text-gray-900 text-sm">Email Notifications</span><p class="text-xs text-gray-500">Send email notifications for events</p></div><div class="relative" x-data="{ on: true }"><input type="checkbox" class="sr-only" @click="on=!on"><div class="w-10 h-6 rounded-full transition-colors" :class="on?'bg-medical-500':'bg-gray-200'"></div><div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform" :class="on?'translate-x-4':''"></div></div></label>
            </div>
        </div>

        <!-- API Keys -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <h2 class="font-display font-bold text-gray-900 mb-6">API Configuration</h2>
            <div class="space-y-4">
                <div><label class="block text-sm font-semibold text-gray-700 mb-1.5">API Key</label><div class="flex gap-2"><input type="text" value="mc_live_sk_1234567890abcdef" class="flex-1 px-4 py-3 border border-gray-200 rounded-xl text-sm bg-gray-50 font-mono" readonly><button class="px-4 py-3 border border-gray-200 rounded-xl text-sm text-gray-600 hover:bg-gray-50">Copy</button></div></div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-1.5">Webhook URL</label><input type="url" value="https://api.healix.com/webhooks" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm font-mono focus:ring-2 focus:ring-medical-300 outline-none"></div>
            </div>
        </div>

        <div class="flex justify-end"><button class="px-8 py-3 morphing-bg text-white font-semibold rounded-xl shadow-lg">Save Settings</button></div>
    </div>
</main>
@endsection
