@extends('layouts.app')

@section('title', 'About HTR Engineering | Leading Roller Shutters Singapore Company | 15+ Years Experience')
@section('meta_description', 'About HTR Engineering - Singapore\'s trusted roller shutters, security grilles & automatic gates specialist since 2009. 500+ projects completed. Licensed & insured contractor.')

@section('content')
{{-- Page Header --}}
<section class="bg-gradient-to-r from-primary-800 to-primary-900 text-white py-6 md:py-10">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">About Us</h1>
        <p class="text-xl text-primary-100 max-w-3xl">
            {{ $hero->subtitle ?? 'Your trusted partner for quality construction and security solutions in Singapore since 2009.' }}
        </p>
    </div>
</section>

{{-- Company Overview --}}
@if($hero && $hero->is_active)
<section class="py-16 md:py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    {{ $hero->title ?? 'Who We Are' }}
                </h2>
                <div class="prose prose-lg text-gray-600">
                    <p class="mb-4">
                        {{ $hero->content ?? 'HTR ENGINEERING PTE LTD is a leading provider of roller shutters, security grilles, automatic gates, and comprehensive construction services in Singapore. With over 15 years of industry experience, we have established ourselves as a trusted name in the market.' }}
                    </p>
                </div>
            </div>
            <div class="relative">
                <div class="bg-primary-100 rounded-2xl p-8 shadow-xl">
                    @if($hero && $hero->image && imageExists($hero->image))
                        <img src="{{ imageUrl($hero->image) }}" 
                             alt="{{ $hero->title }}" 
                             class="rounded-lg shadow-lg w-full">
                    @else
                        <div class="rounded-lg shadow-lg w-full h-80 bg-gradient-to-br from-primary-100 to-primary-200 flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-16 h-16 mx-auto text-primary-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                <p class="text-primary-600 font-semibold">HTR ENGINEERING</p>
                                <p class="text-primary-500 text-sm">Upload company image from admin panel</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- Mission & Why Choose Us --}}
@if(($mission && $mission->is_active) || ($vision && $vision->is_active))
<section class="py-12 md:py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            @if($mission && $mission->is_active)
            <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow">
                <div class="bg-primary-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $mission->title ?? 'Our Mission' }}</h3>
                <p class="text-gray-600">
                    {{ $mission->content ?? 'To deliver superior quality roller shutters, security solutions, and construction services that exceed our clients\' expectations. We are committed to providing innovative, reliable, and cost-effective solutions while maintaining the highest standards of safety and professionalism.' }}
                </p>
            </div>
            @endif
            
            @if($vision && $vision->is_active)
            <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow">
                <div class="bg-primary-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m3 5.197H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $vision->title ?? 'Why Choose Us' }}</h3>
                <p class="text-gray-600">
                    {{ $vision->content ?? 'Choose HTR Engineering for our extensive experience, professional team, quality materials, competitive pricing, and dedicated customer service. We pride ourselves on completing projects on time and within budget while maintaining the highest standards of workmanship.' }}
                </p>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

{{-- Why Choose Us --}}
<section class="py-12 md:py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose Us</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Here's what sets us apart from other service providers in Singapore.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="text-center p-6">
                <div class="bg-primary-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Quality Assurance</h3>
                <p class="text-gray-600">
                    We use only premium materials and certified products, ensuring longevity and reliability.
                </p>
            </div>

            <div class="text-center p-6">
                <div class="bg-primary-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Timely Delivery</h3>
                <p class="text-gray-600">
                    We respect your time and ensure projects are completed within agreed timelines.
                </p>
            </div>

            <div class="text-center p-6">
                <div class="bg-primary-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Expert Team</h3>
                <p class="text-gray-600">
                    Our skilled technicians are trained and experienced in all aspects of installation.
                </p>
            </div>

            <div class="text-center p-6">
                <div class="bg-primary-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Competitive Pricing</h3>
                <p class="text-gray-600">
                    Fair and transparent pricing without compromising on quality or service.
                </p>
            </div>

            <div class="text-center p-6">
                <div class="bg-primary-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">24/7 Support</h3>
                <p class="text-gray-600">
                    Round-the-clock customer support and emergency repair services available.
                </p>
            </div>

            <div class="text-center p-6">
                <div class="bg-primary-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Warranty Protection</h3>
                <p class="text-gray-600">
                    Comprehensive warranty coverage on all installations and products.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Call to Action --}}
<section class="py-16 bg-gradient-to-r from-primary-700 to-primary-900 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Work With Us?</h2>
        <p class="text-xl mb-8 text-primary-100 max-w-2xl mx-auto">
            Get in touch today to discuss your project requirements and receive a free consultation.
        </p>
        <a href="{{ route('contact') }}" class="inline-block bg-white text-primary-900 px-8 py-4 rounded-lg font-bold text-lg hover:bg-primary-50 transition-colors">
            Contact Us Today
        </a>
    </div>
</section>
@endsection
