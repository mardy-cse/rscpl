@extends('layouts.app')

@section('title', $pageTitle . ' - HTR ENGINEERING PTE LTD')

@section('content')
<!-- Page Header -->
<div class="bg-gradient-to-br from-primary-700 to-primary-900 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $policy->title }}</h1>
            <p class="text-primary-100 text-lg">
                <i class="far fa-calendar-alt mr-2"></i>
                Last Updated: {{ $policy->updated_at->format('F d, Y') }}
            </p>
        </div>
    </div>
</div>

<!-- Policy Content -->
<div class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                <div class="prose prose-lg max-w-none">
                    {!! $policy->content !!}
                </div>
            </div>

            <!-- Contact Section -->
            <div class="mt-8 bg-primary-50 border-l-4 border-primary-600 rounded-lg p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-3">
                    <i class="fas fa-envelope text-primary-600 mr-2"></i>
                    Questions or Concerns?
                </h3>
                <p class="text-gray-700 mb-4">
                    If you have any questions about this {{ $policy->title }}, please don't hesitate to contact us.
                </p>
                <a href="{{ route('contact') }}" 
                   class="inline-flex items-center bg-primary-600 hover:bg-primary-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Contact Us
                </a>
            </div>

            <!-- Back Button -->
            <div class="mt-8 text-center">
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center text-gray-600 hover:text-primary-600 font-medium transition duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .prose h2 {
        color: #1e3a8a;
        font-size: 1.875rem;
        font-weight: 700;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }
    .prose h3 {
        color: #1e40af;
        font-size: 1.5rem;
        font-weight: 600;
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
    }
    .prose p {
        color: #374151;
        margin-bottom: 1rem;
        line-height: 1.75;
    }
    .prose ul {
        margin-left: 1.5rem;
        margin-bottom: 1rem;
    }
    .prose li {
        color: #4b5563;
        margin-bottom: 0.5rem;
    }
    .prose a {
        color: #2563eb;
        text-decoration: underline;
    }
    .prose a:hover {
        color: #1d4ed8;
    }
</style>
@endsection
