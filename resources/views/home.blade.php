@extends('layouts.app')

@section('title', 'Home - Roller Shutter & Construction Pte. Ltd. Singapore')
@section('meta_description', 'Professional roller shutters, security grilles, automatic gates & doors in Singapore. Quality construction services with over 15 years of experience. Contact us at +65 8544 5560.')

@section('content')
{{-- Hero Section --}}
<section class="relative bg-gradient-to-br from-primary-900 via-primary-800 to-primary-900 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.05\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    
    <div class="container mx-auto px-4 py-20 md:py-32 relative z-10">
        <div class="max-w-4xl">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Premium Roller Shutters & <span class="text-primary-300">Security Solutions</span> in Singapore
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-200">
                Quality construction services with over 15 years of experience. We specialize in roller shutters, security grilles, automatic gates, and more.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('contact') }}" class="bg-white text-primary-900 px-8 py-4 rounded-lg font-bold text-lg hover:bg-primary-50 transition-all duration-300 text-center shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                    Get Free Quote
                </a>
                <a href="{{ route('services') }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-white hover:text-primary-900 transition-all duration-300 text-center">
                    Our Services
                </a>
            </div>
            <div class="mt-12 flex flex-wrap gap-8">
                <div class="flex items-center gap-3">
                    <div class="bg-primary-700 p-3 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-bold text-lg">15+ Years</div>
                        <div class="text-sm text-gray-300">Experience</div>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="bg-primary-700 p-3 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-bold text-lg">500+</div>
                        <div class="text-sm text-gray-300">Happy Clients</div>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="bg-primary-700 p-3 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-bold text-lg">24/7</div>
                        <div class="text-sm text-gray-300">Support</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Wave Divider --}}
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto">
            <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="#F9FAFB"/>
        </svg>
    </div>
</section>

{{-- Services Preview Section --}}
<section class="py-16 md:py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Comprehensive solutions for all your roller shutter, security, and construction needs in Singapore.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group transform hover:-translate-y-2">
                <div class="bg-gradient-to-br from-primary-700 to-primary-900 p-6 text-white">
                    <div class="bg-white bg-opacity-20 w-16 h-16 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ $service['title'] }}</h3>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">{{ $service['description'] }}</p>
                    <a href="{{ route('services') }}" class="text-primary-700 font-semibold hover:text-primary-900 flex items-center gap-2 group-hover:gap-3 transition-all">
                        Learn More
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('services') }}" class="inline-block bg-primary-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-800 transition-colors">
                View All Services
            </a>
        </div>
    </div>
</section>

{{-- Latest Projects Section --}}
<section class="py-16 md:py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Latest Projects</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Explore our recent installations and see the quality craftsmanship we deliver.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($projects as $project)
            <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="aspect-w-16 aspect-h-12 bg-gray-200">
                    <img src="{{ asset('storage/' . $project['image']) }}" 
                         alt="{{ $project['title'] }}" 
                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                         onerror="this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'400\' height=\'300\'%3E%3Crect fill=\'%23ddd\' width=\'400\' height=\'300\'/%3E%3Ctext fill=\'%23999\' font-family=\'sans-serif\' font-size=\'18\' x=\'50%25\' y=\'50%25\' text-anchor=\'middle\' dominant-baseline=\'middle\'%3E{{ $project['title'] }}%3C/text%3E%3C/svg%3E'">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-6 group-hover:translate-y-0 transition-transform duration-300">
                    <span class="inline-block bg-primary-600 px-3 py-1 rounded-full text-xs font-semibold mb-2">
                        {{ $project['category'] }}
                    </span>
                    <h3 class="text-xl font-bold mb-2">{{ $project['title'] }}</h3>
                    <p class="text-sm text-gray-200 opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                        {{ $project['description'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('gallery') }}" class="inline-block bg-gray-900 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-800 transition-colors">
                View Full Gallery
            </a>
        </div>
    </div>
</section>

{{-- Testimonials Section --}}
<section class="py-16 md:py-24 bg-gradient-to-br from-primary-50 to-blue-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Our Clients Say</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Don't just take our word for it - hear from our satisfied customers.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @foreach($testimonials as $testimonial)
            <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow">
                <div class="flex gap-1 mb-4">
                    @foreach(range(1, $testimonial['rating']) as $star)
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endforeach
                </div>
                <p class="text-gray-600 mb-6 italic">"{{ $testimonial['message'] }}"</p>
                <div>
                    <div class="font-bold text-gray-900">{{ $testimonial['name'] }}</div>
                    <div class="text-sm text-gray-500">{{ $testimonial['company'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Call to Action Section --}}
<section class="py-16 md:py-20 bg-primary-900 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Get Started?</h2>
        <p class="text-xl mb-8 text-primary-100 max-w-2xl mx-auto">
            Contact us today for a free consultation and quote. Our team is ready to help with your project.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:+6585445560" class="bg-white text-primary-900 px-8 py-4 rounded-lg font-bold text-lg hover:bg-primary-50 transition-colors inline-flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                Call Us Now
            </a>
            <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-white hover:text-primary-900 transition-colors">
                Contact Form
            </a>
        </div>
    </div>
</section>
@endsection
