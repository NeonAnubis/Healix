@extends('layouts.app')
@section('title', 'Manage Users')
@section('content')
@include('admin.partials.sidebar')
<main class="ml-64 min-h-screen bg-slate-50">
    <header class="bg-white border-b border-gray-100 px-8 py-4"><h1 class="text-xl font-display font-bold text-gray-900">User Management</h1></header>
    <div class="p-8">
        @php $users = [
            ['name'=>'Admin User','email'=>'admin@healix.com','role'=>'Admin','status'=>'active','joined'=>'Jan 15, 2025'],
            ['name'=>'Sarah Moderator','email'=>'sarah.mod@healix.com','role'=>'Moderator','status'=>'active','joined'=>'Mar 8, 2025'],
            ['name'=>'Dr. Sarah Chen','email'=>'sarah.chen@email.com','role'=>'Doctor','status'=>'active','joined'=>'Apr 12, 2025'],
            ['name'=>'Dr. James Okonkwo','email'=>'j.okonkwo@email.com','role'=>'Doctor','status'=>'active','joined'=>'May 3, 2025'],
            ['name'=>'John Mitchell','email'=>'john.m@email.com','role'=>'Patient','status'=>'active','joined'=>'Jun 20, 2025'],
            ['name'=>'Emily Brown','email'=>'emily.b@email.com','role'=>'Patient','status'=>'active','joined'=>'Jul 1, 2025'],
            ['name'=>'Mark Thompson','email'=>'mark.t@email.com','role'=>'Patient','status'=>'suspended','joined'=>'Aug 15, 2025'],
            ['name'=>'Dr. Maria Rodriguez','email'=>'m.rodriguez@email.com','role'=>'Doctor','status'=>'active','joined'=>'Sep 22, 2025'],
        ]; @endphp
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <table class="w-full">
                <thead><tr class="bg-gray-50 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider"><th class="px-6 py-4">User</th><th class="px-6 py-4">Role</th><th class="px-6 py-4">Status</th><th class="px-6 py-4">Joined</th><th class="px-6 py-4">Actions</th></tr></thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($users as $u)
                    <tr class="hover:bg-gray-50/50">
                        <td class="px-6 py-4"><div class="flex items-center space-x-3"><div class="w-9 h-9 rounded-full flex items-center justify-center font-bold text-sm {{ $u['role']==='Admin' ? 'bg-purple-100 text-purple-600' : ($u['role']==='Moderator' ? 'bg-blue-100 text-blue-600' : ($u['role']==='Doctor' ? 'bg-medical-100 text-medical-600' : 'bg-gray-100 text-gray-600')) }}">{{ substr($u['name'],0,1) }}</div><div><p class="font-medium text-gray-900 text-sm">{{ $u['name'] }}</p><p class="text-xs text-gray-500">{{ $u['email'] }}</p></div></div></td>
                        <td class="px-6 py-4"><span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $u['role']==='Admin' ? 'bg-purple-50 text-purple-700' : ($u['role']==='Moderator' ? 'bg-blue-50 text-blue-700' : ($u['role']==='Doctor' ? 'bg-medical-50 text-medical-700' : 'bg-gray-50 text-gray-700')) }}">{{ $u['role'] }}</span></td>
                        <td class="px-6 py-4"><span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $u['status']==='active' ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }} capitalize">{{ $u['status'] }}</span></td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $u['joined'] }}</td>
                        <td class="px-6 py-4 flex space-x-2"><button class="p-1.5 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-blue-50"><i data-lucide="pencil" class="w-4 h-4"></i></button><button class="p-1.5 text-gray-400 hover:text-red-600 rounded-lg hover:bg-red-50"><i data-lucide="ban" class="w-4 h-4"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
