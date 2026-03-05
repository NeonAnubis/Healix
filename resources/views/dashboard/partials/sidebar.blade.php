<!-- Dashboard Sidebar -->
<aside class="fixed left-0 top-0 bottom-0 w-64 bg-white border-r border-gray-100 z-40 flex flex-col" x-data="{ collapsed: false }">
    <!-- Logo -->
    <div class="p-5 border-b border-gray-100">
        <a href="{{ route('home') }}" class="flex items-center space-x-2">
            <div class="w-9 h-9 morphing-bg rounded-xl flex items-center justify-center"><svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C9 2 7 4.5 7 7s2 5 5 8c3-3 5-5.5 5-8s-2-5-5-5zm0 18c-3-3-5-5.5-5-8s2-5 5-5 5 2.5 5 5-2 5-5 8z" fill-rule="evenodd"/></svg></div>
            <span class="text-lg font-display font-bold gradient-text">Healix</span>
        </a>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
        <a href="{{ route('dashboard.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('dashboard.index') ? 'bg-medical-50 text-medical-700' : 'text-gray-600 hover:bg-gray-50' }}">
            <i data-lucide="layout-dashboard" class="w-5 h-5"></i><span>Overview</span>
        </a>
        <a href="{{ route('dashboard.appointments') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('dashboard.appointments') ? 'bg-medical-50 text-medical-700' : 'text-gray-600 hover:bg-gray-50' }}">
            <i data-lucide="calendar" class="w-5 h-5"></i><span>Appointments</span>
            <span class="ml-auto px-2 py-0.5 bg-medical-100 text-medical-700 text-xs rounded-full font-bold">8</span>
        </a>
        <a href="{{ route('dashboard.patients') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('dashboard.patients') ? 'bg-medical-50 text-medical-700' : 'text-gray-600 hover:bg-gray-50' }}">
            <i data-lucide="users" class="w-5 h-5"></i><span>Patients</span>
        </a>
        <a href="{{ route('dashboard.profile') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('dashboard.profile') ? 'bg-medical-50 text-medical-700' : 'text-gray-600 hover:bg-gray-50' }}">
            <i data-lucide="user-circle" class="w-5 h-5"></i><span>My Profile</span>
        </a>
        <a href="{{ route('dashboard.reviews') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('dashboard.reviews') ? 'bg-medical-50 text-medical-700' : 'text-gray-600 hover:bg-gray-50' }}">
            <i data-lucide="star" class="w-5 h-5"></i><span>Reviews</span>
            <span class="ml-auto px-2 py-0.5 bg-amber-100 text-amber-700 text-xs rounded-full font-bold">7</span>
        </a>
        <div class="pt-4 mt-4 border-t border-gray-100">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50">
                <i data-lucide="external-link" class="w-5 h-5"></i><span>View Public Site</span>
            </a>
            <a href="{{ route('admin.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50">
                <i data-lucide="shield" class="w-5 h-5"></i><span>Admin Panel</span>
            </a>
        </div>
    </nav>

    <!-- User Info -->
    <div class="p-4 border-t border-gray-100">
        <div class="flex items-center space-x-3">
            <img src="{{ $doctor['image'] ?? 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=80&h=80&fit=crop&crop=face' }}" class="w-10 h-10 rounded-full object-cover ring-2 ring-gray-100">
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-900 truncate">{{ $doctor['name'] ?? 'Dr. Sarah Chen' }}</p>
                <p class="text-xs text-gray-500 truncate">{{ $doctor['specialty'] ?? 'Cardiology' }}</p>
            </div>
        </div>
    </div>
</aside>
