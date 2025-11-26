@extends('layouts.app')

@section('title', '404 - Page Not Found')
@section('meta_description', 'The page you are looking for could not be found.')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-blue-50 py-16 px-4">
    <div class="max-w-2xl mx-auto text-center">
        {{-- 404 Illustration --}}
        <div class="mb-8">
            <svg class="w-64 h-64 mx-auto text-primary-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" fill="currentColor" opacity="0.2"/>
                <path d="M11 15h2v2h-2zM11 7h2v6h-2z" fill="currentColor"/>
            </svg>
        </div>

        {{-- Error Content --}}
        <div class="mb-8">
            <h1 class="text-8xl md:text-9xl font-bold text-primary-700 mb-4">404</h1>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Page Not Found</h2>
            <p class="text-lg text-gray-600 mb-8 max-w-md mx-auto">
                Sorry, we couldn't find the page you're looking for. Perhaps you've mistyped the URL? Be sure to check your spelling.
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
            
            <button onclick="window.history.back()" 
                    class="inline-flex items-center gap-2 bg-gray-200 text-gray-800 px-8 py-4 rounded-lg font-bold text-lg hover:bg-gray-300 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Go Back
            </button>
        </div>

        {{-- Quick Links --}}
        <div class="mt-12 pt-8 border-t border-gray-200">
            <p class="text-gray-600 mb-4 font-semibold">Quick Links:</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('about') }}" class="text-primary-700 hover:text-primary-800 hover:underline font-medium">About Us</a>
                <span class="text-gray-400">|</span>
                <a href="{{ route('services') }}" class="text-primary-700 hover:text-primary-800 hover:underline font-medium">Services</a>
                <span class="text-gray-400">|</span>
                <a href="{{ route('gallery') }}" class="text-primary-700 hover:text-primary-800 hover:underline font-medium">Gallery</a>
                <span class="text-gray-400">|</span>
                <a href="{{ route('contact') }}" class="text-primary-700 hover:text-primary-800 hover:underline font-medium">Contact Us</a>
            </div>
        </div>
    </div>
</section>
@endsection
