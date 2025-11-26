@extends('layouts.app')

@section('title', '500 - Server Error')
@section('meta_description', 'Something went wrong on our server.')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-red-50 via-white to-red-50 py-16 px-4">
    <div class="max-w-2xl mx-auto text-center">
        {{-- 500 Illustration --}}
        <div class="mb-8">
            <svg class="w-64 h-64 mx-auto text-red-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" fill="currentColor" opacity="0.2"/>
                <path d="M13 3h-2v10h2V3zm0 12h-2v2h2v-2z" fill="currentColor"/>
            </svg>
        </div>

        {{-- Error Content --}}
        <div class="mb-8">
            <h1 class="text-8xl md:text-9xl font-bold text-red-600 mb-4">500</h1>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Internal Server Error</h2>
            <p class="text-lg text-gray-600 mb-8 max-w-md mx-auto">
                Oops! Something went wrong on our end. We're working to fix the issue. Please try again later.
            </p>
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('home') }}" 
               class="inline-flex items-center gap-2 bg-primary-700 text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-primary-800 transition-colors shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Go to Homepage
            </a>
            
            <button onclick="location.reload()" 
                    class="inline-flex items-center gap-2 bg-gray-200 text-gray-800 px-8 py-4 rounded-lg font-bold text-lg hover:bg-gray-300 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Try Again
            </button>
        </div>

        {{-- Support Info --}}
        <div class="mt-12 pt-8 border-t border-gray-200">
            <p class="text-gray-600 mb-4">If the problem persists, please contact us:</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4 items-center">
                <a href="tel:{{ str_replace(' ', '', setting('phone', '+6585445560')) }}" 
                   class="inline-flex items-center gap-2 text-primary-700 hover:text-primary-800 font-semibold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    {{ setting('phone', '+65 8697 3181') }}
                </a>
                <span class="text-gray-400 hidden sm:inline">|</span>
                <a href="mailto:{{ setting('email', 'rollershutter14@gmail.com') }}" 
                   class="inline-flex items-center gap-2 text-primary-700 hover:text-primary-800 font-semibold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    {{ setting('email', 'rollershutter14@gmail.com') }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
