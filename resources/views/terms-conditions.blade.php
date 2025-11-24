@extends('layouts.app')

@section('title', 'Terms and Conditions - Roller Shutter & Construction Pte. Ltd.')
@section('meta_description', 'Read the terms and conditions for Roller Shutter & Construction Pte. Ltd. services in Singapore.')

@section('content')
{{-- Page Header --}}
<section class="bg-gradient-to-r from-primary-800 to-primary-900 text-white py-8 md:py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Terms and Conditions</h1>
        <p class="text-xl text-primary-100 max-w-3xl">
            Please read these terms carefully before using our services.
        </p>
    </div>
</section>

{{-- Terms Content Section --}}
<section class="py-16 md:py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="prose prose-lg max-w-none">
                {!! App\Models\TermsCondition::getContent() !!}
            </div>

            <!-- Contact Section -->
            <div class="mt-12 p-6 bg-primary-50 border-l-4 border-primary-600 rounded">
                <h3 class="text-xl font-bold text-gray-900 mb-3">
                    <i class="fas fa-question-circle text-primary-600 mr-2"></i>
                    Have Questions?
                </h3>
                <p class="text-gray-700 mb-4">
                    If you have any questions about these Terms and Conditions, please don't hesitate to contact us.
                </p>
                <div class="flex flex-col md:flex-row gap-4">
                    <a href="mailto:{{ App\Models\Setting::get('email', 'rollershutter14@gmail.com') }}" 
                       class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium">
                        <i class="fas fa-envelope mr-2"></i>
                        {{ App\Models\Setting::get('email', 'rollershutter14@gmail.com') }}
                    </a>
                    <a href="tel:{{ str_replace(' ', '', App\Models\Setting::get('phone', '+6585445560')) }}" 
                       class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium">
                        <i class="fas fa-phone mr-2"></i>
                        {{ App\Models\Setting::get('phone', '+65 8544 5560') }}
                    </a>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-8 text-center">
                <a href="{{ url('/') }}" 
                   class="inline-flex items-center px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-md transition">
                    <i class="fas fa-home mr-2"></i>
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</section>

<style>
.prose h2 {
    font-size: 1.75rem;
    font-weight: 700;
    color: #1f2937;
    margin-top: 2rem;
    margin-bottom: 1rem;
}
.prose h3 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #374151;
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
}
.prose p {
    margin-bottom: 1rem;
    line-height: 1.75;
    color: #4b5563;
}
.prose ul {
    margin-top: 0.5rem;
    margin-bottom: 1rem;
    padding-left: 1.5rem;
}
.prose li {
    margin-bottom: 0.5rem;
    color: #4b5563;
}
.prose strong {
    font-weight: 600;
    color: #1f2937;
}
.prose em {
    font-style: italic;
    color: #6b7280;
}
</style>
@endsection
