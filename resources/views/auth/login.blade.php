<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Sign In - Healix</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>tailwind.config={theme:{extend:{colors:{medical:{50:'#f0fdfa',100:'#ccfbf1',500:'#14b8a6',600:'#0d9488',700:'#0f766e'}},fontFamily:{sans:['Inter','system-ui','sans-serif'],display:['Plus Jakarta Sans','system-ui','sans-serif']}}}}</script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<style>.gradient-text{background:linear-gradient(135deg,#0d9488 0%,#2563eb 50%,#7c3aed 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}.morphing-bg{background:linear-gradient(-45deg,#0d9488,#2563eb,#7c3aed,#059669);background-size:400% 400%;animation:g 15s ease infinite}@keyframes g{0%{background-position:0% 50%}50%{background-position:100% 50%}100%{background-position:0% 50%}}</style></head>
<body class="font-sans antialiased min-h-screen bg-gray-50">
<div class="min-h-screen flex">
    <!-- Left Panel -->
    <div class="hidden lg:flex lg:w-1/2 relative morphing-bg items-center justify-center p-12">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative text-center text-white max-w-md">
            <div class="w-16 h-16 bg-white/20 backdrop-blur rounded-2xl flex items-center justify-center mx-auto mb-8">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C9 2 7 4.5 7 7s2 5 5 8c3-3 5-5.5 5-8s-2-5-5-5zm0 18c-3-3-5-5.5-5-8s2-5 5-5 5 2.5 5 5-2 5-5 8z" fill-rule="evenodd"/></svg>
            </div>
            <h1 class="text-4xl font-display font-bold mb-4 text-shadow-lg">Welcome Back</h1>
            <p class="text-white/80 text-lg leading-relaxed">Access your healthcare dashboard and manage your appointments with ease.</p>
            <div class="mt-12 grid grid-cols-3 gap-4">
                <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=120&h=120&fit=crop&crop=face" class="w-full rounded-2xl opacity-80" alt="">
                <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=120&h=120&fit=crop&crop=face" class="w-full rounded-2xl opacity-80 mt-8" alt="">
                <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?w=120&h=120&fit=crop&crop=face" class="w-full rounded-2xl opacity-80" alt="">
            </div>
        </div>
    </div>

    <!-- Right Panel - Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
        <div class="w-full max-w-md">
            <a href="/" class="flex items-center space-x-2 mb-10">
                <div class="w-10 h-10 morphing-bg rounded-xl flex items-center justify-center"><svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C9 2 7 4.5 7 7s2 5 5 8c3-3 5-5.5 5-8s-2-5-5-5zm0 18c-3-3-5-5.5-5-8s2-5 5-5 5 2.5 5 5-2 5-5 8z" fill-rule="evenodd"/></svg></div>
                <span class="text-xl font-display font-bold gradient-text">Healix</span>
            </a>

            <h2 class="text-2xl font-display font-bold text-gray-900 mb-2">Sign in to your account</h2>
            <p class="text-gray-500 mb-8">Enter your credentials to access your dashboard</p>

            <form class="space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email Address</label>
                    <input type="email" placeholder="you@example.com" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 focus:border-medical-300 outline-none transition-all" value="doctor@medconnect.com">
                </div>
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="block text-sm font-semibold text-gray-700">Password</label>
                        <a href="#" class="text-sm text-medical-600 hover:underline">Forgot password?</a>
                    </div>
                    <input type="password" placeholder="Enter your password" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 focus:border-medical-300 outline-none transition-all" value="password123">
                </div>
                <label class="flex items-center space-x-2 cursor-pointer">
                    <input type="checkbox" checked class="w-4 h-4 rounded border-gray-300 text-medical-600 focus:ring-medical-300">
                    <span class="text-sm text-gray-600">Remember me for 30 days</span>
                </label>
                <a href="/dashboard" class="block w-full py-3.5 morphing-bg text-white font-bold rounded-xl text-center shadow-lg hover:shadow-xl transition-all">Sign In</a>
            </form>

            <div class="relative my-8"><div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-200"></div></div><div class="relative flex justify-center text-sm"><span class="px-4 bg-gray-50 text-gray-500">Or continue with</span></div></div>

            <div class="grid grid-cols-2 gap-4">
                <button class="flex items-center justify-center px-4 py-3 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                    <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 01-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
                    Google
                </button>
                <button class="flex items-center justify-center px-4 py-3 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.8-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/></svg>
                    Apple
                </button>
            </div>

            <p class="text-center text-sm text-gray-500 mt-8">Don't have an account? <a href="/register" class="text-medical-600 font-semibold hover:underline">Create one free</a></p>

            <div class="mt-6 p-4 bg-blue-50 rounded-xl border border-blue-100">
                <p class="text-xs text-blue-700 font-medium mb-1">Demo Quick Access:</p>
                <div class="flex flex-wrap gap-2">
                    <a href="/dashboard" class="px-3 py-1 bg-blue-100 text-blue-800 text-xs rounded-full hover:bg-blue-200">Doctor Dashboard</a>
                    <a href="/admin" class="px-3 py-1 bg-purple-100 text-purple-800 text-xs rounded-full hover:bg-purple-200">Admin Panel</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body></html>
