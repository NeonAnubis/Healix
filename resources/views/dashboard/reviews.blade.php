@extends('layouts.app')
@section('title', 'Reviews')
@section('content')
@include('dashboard.partials.sidebar')
<main class="ml-64 min-h-screen bg-gray-50">
    <header class="bg-white border-b border-gray-100 px-8 py-4"><h1 class="text-xl font-display font-bold text-gray-900">Patient Reviews</h1></header>
    <div class="p-8">
        <!-- Overall Rating -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-8 flex items-center space-x-8">
            <div class="text-center">
                <div class="text-5xl font-display font-bold text-gray-900">{{ $doctor['rating'] }}</div>
                <div class="flex items-center justify-center space-x-1 mt-2">@for($i=0;$i<5;$i++)<svg class="w-5 h-5 {{ $i < floor($doctor['rating']) ? 'text-amber-400' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endfor</div>
                <div class="text-sm text-gray-500 mt-1">{{ $doctor['reviews_count'] }} reviews</div>
            </div>
            <div class="flex-1 space-y-2">
                @foreach([['5',78],['4',15],['3',4],['2',2],['1',1]] as [$star,$pct])
                <div class="flex items-center space-x-3"><span class="text-sm text-gray-600 w-3">{{ $star }}</span><svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg><div class="flex-1 h-2 bg-gray-100 rounded-full"><div class="h-2 bg-amber-400 rounded-full" style="width:{{ $pct }}%"></div></div><span class="text-xs text-gray-500 w-8">{{ $pct }}%</span></div>
                @endforeach
            </div>
        </div>

        <!-- Reviews List -->
        @php $reviews = [
            ['name'=>'Amanda K.','rating'=>5,'date'=>'Mar 3, 2026','text'=>'Exceptional care and attention. Dr. Chen took time to explain my condition thoroughly and discuss all treatment options. I felt truly heard.','replied'=>true,'reply'=>'Thank you Amanda! It was a pleasure to help you on your health journey.'],
            ['name'=>'Brian T.','rating'=>5,'date'=>'Feb 28, 2026','text'=>'Best cardiologist I\'ve ever seen. Professional, knowledgeable, and genuinely caring. The whole team was fantastic.','replied'=>false,'reply'=>''],
            ['name'=>'Carol M.','rating'=>4,'date'=>'Feb 20, 2026','text'=>'Great care overall. Wait time was about 20 minutes longer than expected, but Dr. Chen was very thorough once we started.','replied'=>true,'reply'=>'Thank you for your feedback Carol. We are working on improving our scheduling to reduce wait times.'],
            ['name'=>'David R.','rating'=>5,'date'=>'Feb 15, 2026','text'=>'Dr. Chen literally saved my life. Her quick diagnosis and treatment plan has been incredibly effective. Forever grateful.','replied'=>false,'reply'=>''],
            ['name'=>'Elena S.','rating'=>5,'date'=>'Feb 10, 2026','text'=>'Wonderful bedside manner. Explains complex cardiac issues in simple terms. Highly recommend to anyone seeking heart care.','replied'=>false,'reply'=>''],
            ['name'=>'Frank H.','rating'=>4,'date'=>'Feb 5, 2026','text'=>'Very professional and knowledgeable. The follow-up care has been excellent. Would recommend to others.','replied'=>true,'reply'=>'Thank you Frank! Looking forward to your next check-up.'],
        ]; @endphp

        <div class="space-y-4">
            @foreach($reviews as $review)
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center font-semibold text-gray-600">{{ substr($review['name'],0,1) }}</div>
                        <div><p class="font-semibold text-gray-900 text-sm">{{ $review['name'] }}</p><p class="text-xs text-gray-500">{{ $review['date'] }}</p></div>
                    </div>
                    <div class="flex space-x-0.5">@for($i=0;$i<$review['rating'];$i++)<svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endfor</div>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed">{{ $review['text'] }}</p>
                @if($review['replied'])
                <div class="mt-4 ml-6 p-4 bg-medical-50 rounded-xl border-l-4 border-medical-500">
                    <p class="text-xs font-semibold text-medical-700 mb-1">Your Reply:</p>
                    <p class="text-sm text-gray-700">{{ $review['reply'] }}</p>
                </div>
                @else
                <div class="mt-4" x-data="{ replying: false }">
                    <button @click="replying=!replying" class="text-sm text-medical-600 hover:underline font-medium">Reply to review</button>
                    <div x-show="replying" x-transition class="mt-2 flex gap-2">
                        <input type="text" placeholder="Write a reply..." class="flex-1 px-4 py-2 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-medical-300 outline-none">
                        <button class="px-4 py-2 morphing-bg text-white text-sm font-semibold rounded-xl">Send</button>
                    </div>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
