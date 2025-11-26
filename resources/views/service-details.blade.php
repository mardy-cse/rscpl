@extends('layouts.app')

@section('title', $service->title . ' - HTR ENGINEERING PTE LTD')
@section('meta_description', $service->description)

@section('content')
{{-- Page Header --}}
<section class="bg-gradient-to-r from-primary-800 to-primary-900 text-white py-8 md:py-12">
    <div class="container mx-auto px-4">
        <nav class="text-xs mb-3">
            <ol class="flex items-center space-x-2 text-primary-200">
                <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                <li><span class="mx-1">/</span></li>
                <li><a href="{{ route('services') }}" class="hover:text-white">Services</a></li>
                <li><span class="mx-1">/</span></li>
                <li class="text-white">{{ $service->title }}</li>
            </ol>
        </nav>
        
        <div class="flex items-center gap-3">
            @if($service->icon)
                <div class="bg-white/10 backdrop-blur-sm p-3 rounded-xl">
                    <i class="{{ $service->icon }} text-3xl"></i>
                </div>
            @endif
            <div>
                <h1 class="text-2xl md:text-3xl font-bold mb-2">{{ $service->title }}</h1>
                <p class="text-sm text-primary-100">{{ $service->description }}</p>
            </div>
        </div>
    </div>
</section>

{{-- Service Details --}}
<section class="py-16 md:py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            {{-- Main Content --}}
            <div class="lg:col-span-2">
                @if($service->image)
                <div class="mb-8 rounded-2xl overflow-hidden shadow-xl">
                    <img src="{{ asset('storage/' . $service->image) }}" 
                         alt="{{ $service->title }}" 
                         class="w-full h-96 object-cover">
                </div>
                @endif

                @if($service->details)
                <div class="prose prose-lg max-w-none mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">About This Service</h2>
                    <p class="text-gray-700 leading-relaxed">{{ $service->details }}</p>
                </div>
                @endif

                @if($service->features && is_array($service->features) && count($service->features) > 0)
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Key Features & Benefits</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($service->features as $feature)
                        <div class="flex items-start gap-3 bg-green-50 p-4 rounded-lg border border-green-200">
                            <svg class="w-6 h-6 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-gray-800 font-medium">{{ $feature }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Why Choose Us --}}
                <div class="bg-gradient-to-br from-primary-50 to-blue-50 rounded-2xl p-8 mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Why Choose HTR Engineering?</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-award text-3xl text-primary-600"></i>
                            <div>
                                <h3 class="font-bold text-lg text-gray-900 mb-1">Expert Team</h3>
                                <p class="text-gray-700">Experienced professionals with industry expertise</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="fas fa-shield-alt text-3xl text-primary-600"></i>
                            <div>
                                <h3 class="font-bold text-lg text-gray-900 mb-1">Quality Guarantee</h3>
                                <p class="text-gray-700">Premium materials and workmanship warranty</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="fas fa-clock text-3xl text-primary-600"></i>
                            <div>
                                <h3 class="font-bold text-lg text-gray-900 mb-1">Timely Delivery</h3>
                                <p class="text-gray-700">On-time project completion guaranteed</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="fas fa-headset text-3xl text-primary-600"></i>
                            <div>
                                <h3 class="font-bold text-lg text-gray-900 mb-1">24/7 Support</h3>
                                <p class="text-gray-700">Round-the-clock customer assistance</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-1">
                {{-- Request Quote Card --}}
                <div class="bg-gradient-to-br from-primary-700 to-primary-900 text-white rounded-2xl p-8 mb-8 sticky top-8">
                    <h3 class="text-2xl font-bold mb-4">Get a Free Quote</h3>
                    <p class="text-primary-100 mb-6">Contact us today for a free consultation and competitive quotation.</p>
                    
                    <div class="space-y-4 mb-6">
                        <a href="tel:+6586973181" class="flex items-center gap-3 text-white hover:text-primary-200 transition">
                            <i class="fas fa-phone-alt text-xl"></i>
                            <div>
                                <div class="text-xs text-primary-200">Call Us</div>
                                <div class="font-bold">+65 8697 3181</div>
                            </div>
                        </a>
                        <a href="mailto:rollershutter14@gmail.com" class="flex items-center gap-3 text-white hover:text-primary-200 transition">
                            <i class="fas fa-envelope text-xl"></i>
                            <div>
                                <div class="text-xs text-primary-200">Email Us</div>
                                <div class="font-bold">rollershutter14@gmail.com</div>
                            </div>
                        </a>
                    </div>

                    <a href="{{ route('contact') }}" class="block w-full bg-white text-primary-900 text-center font-bold py-4 px-6 rounded-xl hover:bg-primary-50 transition">
                        <i class="fas fa-paper-plane mr-2"></i>Request Quote
                    </a>
                </div>

                {{-- Related Services --}}
                @if($relatedServices->count() > 0)
                <div class="bg-white rounded-2xl border border-gray-200 p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Other Services</h3>
                    <div class="space-y-3">
                        @foreach($relatedServices as $related)
                            @if($related->id != $service->id)
                            <a href="{{ route('service.details', $related->id) }}" 
                               class="flex items-center gap-3 p-3 rounded-lg hover:bg-primary-50 transition group">
                                @if($related->icon)
                                    <i class="{{ $related->icon }} text-2xl text-primary-600 group-hover:scale-110 transition"></i>
                                @endif
                                <div class="flex-grow">
                                    <div class="font-semibold text-gray-900 group-hover:text-primary-700">{{ $related->title }}</div>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-primary-600"></i>
                            </a>
                            @endif
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="py-16 bg-gradient-to-r from-primary-700 to-primary-900 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Get Started?</h2>
        <p class="text-xl mb-8 text-primary-100 max-w-2xl mx-auto">
            Contact us today to discuss your {{ $service->title }} requirements.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:+6586973181" class="inline-flex items-center justify-center gap-2 bg-white text-primary-900 px-8 py-4 rounded-lg font-bold text-lg hover:bg-primary-50 transition-colors">
                <i class="fas fa-phone-alt"></i>
                Call Now
            </a>
            <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-white hover:text-primary-900 transition-colors">
                Get Free Quote
            </a>
        </div>
    </div>
</section>
@endsection
