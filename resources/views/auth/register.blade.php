<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Create Account - Healix</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>tailwind.config={theme:{extend:{colors:{medical:{50:'#f0fdfa',100:'#ccfbf1',500:'#14b8a6',600:'#0d9488',700:'#0f766e'}},fontFamily:{sans:['Inter','system-ui','sans-serif'],display:['Plus Jakarta Sans','system-ui','sans-serif']}}}}</script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<style>.gradient-text{background:linear-gradient(135deg,#0d9488 0%,#2563eb 50%,#7c3aed 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}.morphing-bg{background:linear-gradient(-45deg,#0d9488,#2563eb,#7c3aed,#059669);background-size:400% 400%;animation:g 15s ease infinite}@keyframes g{0%{background-position:0% 50%}50%{background-position:100% 50%}100%{background-position:0% 50%}}</style></head>
<body class="font-sans antialiased min-h-screen bg-gray-50">
<div class="min-h-screen flex">
    <div class="hidden lg:flex lg:w-1/2 relative morphing-bg items-center justify-center p-12">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative text-center text-white max-w-md">
            <div class="w-16 h-16 bg-white/20 backdrop-blur rounded-2xl flex items-center justify-center mx-auto mb-8">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
            </div>
            <h1 class="text-4xl font-display font-bold mb-4">Join Healix</h1>
            <p class="text-white/80 text-lg leading-relaxed">Whether you're a patient seeking care or a professional growing your practice, we've got you covered.</p>
            <div class="mt-12 flex justify-center gap-4">
                <img src="https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=200&h=150&fit=crop" class="w-40 rounded-2xl opacity-80 shadow-xl" alt="">
                <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=200&h=150&fit=crop" class="w-40 rounded-2xl opacity-80 shadow-xl mt-8" alt="">
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 overflow-y-auto">
        <div class="w-full max-w-md" x-data="{ role: 'patient' }">
            <a href="/" class="flex items-center space-x-2 mb-8">
                <div class="w-10 h-10 morphing-bg rounded-xl flex items-center justify-center"><svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C9 2 7 4.5 7 7s2 5 5 8c3-3 5-5.5 5-8s-2-5-5-5zm0 18c-3-3-5-5.5-5-8s2-5 5-5 5 2.5 5 5-2 5-5 8z" fill-rule="evenodd"/></svg></div>
                <span class="text-xl font-display font-bold gradient-text">Healix</span>
            </a>

            <h2 class="text-2xl font-display font-bold text-gray-900 mb-2">Create your account</h2>
            <p class="text-gray-500 mb-6">Choose your account type to get started</p>

            <!-- Role Selector -->
            <div class="grid grid-cols-2 gap-3 mb-6">
                <button @click="role='patient'" :class="role==='patient' ? 'border-medical-500 bg-medical-50 text-medical-700' : 'border-gray-200 text-gray-600 hover:border-gray-300'" class="p-4 border-2 rounded-xl transition-all text-center">
                    <svg class="w-8 h-8 mx-auto mb-2" :class="role==='patient' ? 'text-medical-500' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <span class="text-sm font-semibold">Patient</span>
                    <p class="text-xs mt-1 opacity-70">Find & book doctors</p>
                </button>
                <button @click="role='doctor'" :class="role==='doctor' ? 'border-medical-500 bg-medical-50 text-medical-700' : 'border-gray-200 text-gray-600 hover:border-gray-300'" class="p-4 border-2 rounded-xl transition-all text-center">
                    <svg class="w-8 h-8 mx-auto mb-2" :class="role==='doctor' ? 'text-medical-500' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-sm font-semibold">Professional</span>
                    <p class="text-xs mt-1 opacity-70">Grow your practice</p>
                </button>
            </div>

            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Full Name</label>
                    <input type="text" placeholder="Your full name" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 focus:border-medical-300 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email Address</label>
                    <input type="email" placeholder="you@example.com" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 focus:border-medical-300 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Password</label>
                    <input type="password" placeholder="Create a strong password" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 focus:border-medical-300 outline-none">
                </div>

                <!-- Doctor-specific fields -->
                <template x-if="role==='doctor'">
                    <div class="space-y-4 pt-2 border-t border-gray-100">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Medical Specialty</label>
                            <select class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 outline-none">
                                <option value="">Select specialty</option>
                                <option>Cardiology</option><option>Neurology</option><option>Dermatology</option>
                                <option>Orthopedics</option><option>Pediatrics</option><option>Psychiatry</option>
                                <option>Oncology</option><option>Endocrinology</option><option>Other</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Medical License Number</label>
                            <input type="text" placeholder="Enter your license number" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Hospital / Clinic</label>
                            <input type="text" placeholder="Where do you practice?" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 outline-none">
                        </div>
                    </div>
                </template>

                <!-- Patient phone -->
                <template x-if="role==='patient'">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Phone Number</label>
                        <input type="tel" placeholder="(555) 000-0000" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 outline-none">
                    </div>
                </template>

                <label class="flex items-start space-x-2 cursor-pointer">
                    <input type="checkbox" class="w-4 h-4 mt-0.5 rounded border-gray-300 text-medical-600 focus:ring-medical-300">
                    <span class="text-sm text-gray-600">I agree to the <a href="#" class="text-medical-600 hover:underline">Terms of Service</a> and <a href="#" class="text-medical-600 hover:underline">Privacy Policy</a></span>
                </label>

                <button type="button" onclick="window.location.href=role==='doctor'?'/dashboard':'/'" class="w-full py-3.5 morphing-bg text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all">Create Account</button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-6">Already have an account? <a href="/login" class="text-medical-600 font-semibold hover:underline">Sign in</a></p>
        </div>
    </div>
</div>
</body></html>
