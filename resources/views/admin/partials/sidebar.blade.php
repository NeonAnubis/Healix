<!-- Admin Sidebar - Dark Theme -->
<aside class="fixed left-0 top-0 bottom-0 w-64 bg-slate-900 z-40 flex flex-col">
    <div class="p-5 border-b border-slate-700/50">
        <a href="{{ route('admin.index') }}" class="flex items-center space-x-2">
            <div class="w-9 h-9 bg-gradient-to-br from-medical-400 to-primary-500 rounded-xl flex items-center justify-center"><svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C9 2 7 4.5 7 7s2 5 5 8c3-3 5-5.5 5-8s-2-5-5-5zm0 18c-3-3-5-5.5-5-8s2-5 5-5 5 2.5 5 5-2 5-5 8z" fill-rule="evenodd"/></svg></div>
            <div><span class="text-lg font-display font-bold text-white">Healix</span><span class="block text-xs text-slate-400 -mt-0.5">Admin Panel</span></div>
        </a>
    </div>

    <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider px-4 mb-2">Main</p>
        <a href="{{ route('admin.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.index') ? 'bg-slate-700/50 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <i data-lucide="layout-dashboard" class="w-5 h-5"></i><span>Dashboard</span>
        </a>
        <a href="{{ route('admin.doctors') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.doctors') ? 'bg-slate-700/50 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <i data-lucide="stethoscope" class="w-5 h-5"></i><span>Doctors</span>
            <span class="ml-auto px-2 py-0.5 bg-medical-500/20 text-medical-300 text-xs rounded-full font-bold">1.5K</span>
        </a>
        <a href="{{ route('admin.clinics') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.clinics') ? 'bg-slate-700/50 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <i data-lucide="building-2" class="w-5 h-5"></i><span>Clinics</span>
        </a>
        <a href="{{ route('admin.users') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.users') ? 'bg-slate-700/50 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <i data-lucide="users" class="w-5 h-5"></i><span>Users</span>
        </a>

        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider px-4 mb-2 mt-6">Analytics</p>
        <a href="{{ route('admin.reports') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.reports') ? 'bg-slate-700/50 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <i data-lucide="bar-chart-3" class="w-5 h-5"></i><span>Reports</span>
        </a>
        <a href="{{ route('admin.settings') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.settings') ? 'bg-slate-700/50 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <i data-lucide="settings" class="w-5 h-5"></i><span>Settings</span>
        </a>

        <div class="pt-4 mt-4 border-t border-slate-700/50">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-400 hover:bg-slate-800 hover:text-white">
                <i data-lucide="external-link" class="w-5 h-5"></i><span>Public Site</span>
            </a>
            <a href="{{ route('dashboard.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-400 hover:bg-slate-800 hover:text-white">
                <i data-lucide="user-circle" class="w-5 h-5"></i><span>Doctor Dashboard</span>
            </a>
        </div>
    </nav>

    <div class="p-4 border-t border-slate-700/50">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-bold text-sm">AD</div>
            <div class="flex-1 min-w-0"><p class="text-sm font-semibold text-white truncate">Admin User</p><p class="text-xs text-slate-400">Super Admin</p></div>
        </div>
    </div>
</aside>
