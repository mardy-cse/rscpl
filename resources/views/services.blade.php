@extends('layouts.app')

@section('title', 'Our Services - HTR ENGINEERING PTE LTD')
@section('meta_description', 'Professional roller shutters, security grilles, automatic gates, automatic doors, metal fabrication and maintenance services in Singapore. Quality installations with warranty.')

@section('content')
{{-- Page Header --}}
<section class="bg-gradient-to-r from-primary-800 to-primary-900 text-white py-8 md:py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Services</h1>
        <p class="text-xl text-primary-100 max-w-3xl">
            Comprehensive security and construction solutions tailored to your needs.
        </p>
    </div>
</section>

{{-- Services List --}}
<section class="py-16 md:py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($services as $service)
            <a href="{{ route('service.details', $service->id) }}" class="group relative bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 block">
                {{-- Background Image with Overlay --}}
                @if($service->image)
                    <div class="absolute inset-0 z-0">
                        <img src="{{ asset('storage/' . $service->image) }}" 
                             alt="{{ $service->title }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/80 to-black/50"></div>
                    </div>
                @else
                    <div class="absolute inset-0 z-0 bg-gradient-to-br from-primary-700 to-primary-900"></div>
                @endif

                {{-- Content --}}
                <div class="relative z-10 p-8 flex flex-col h-full min-h-[450px]">
                    {{-- Icon --}}
                    <div class="mb-6">
                        <div class="w-20 h-20 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            @if($service->icon)
                                <i class="{{ $service->icon }} text-4xl text-white"></i>
                            @else
                                <i class="fas fa-cog text-4xl text-white"></i>
                            @endif
                        </div>
                    </div>

                    {{-- Title --}}
                    <h2 class="text-3xl font-bold text-white mb-4">{{ $service->title }}</h2>

                    {{-- Description --}}
                    <p class="text-gray-200 text-base leading-relaxed mb-6 flex-grow">
                        {{ $service->description }}
                    </p>

                    {{-- Features --}}
                    @if($service->features && is_array($service->features) && count($service->features) > 0)
                    <div class="mb-6 space-y-2">
                        @foreach(array_slice($service->features, 0, 3) as $feature)
                        <div class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-green-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-gray-200 text-sm">{{ $feature }}</span>
                        </div>
                        @endforeach
                        @if(count($service->features) > 3)
                        <p class="text-white/70 text-sm ml-7">+{{ count($service->features) - 3 }} more features</p>
                        @endif
                    </div>
                    @endif

                    {{-- CTA Button --}}
                    <div class="pt-4 border-t border-white/20">
                        <span class="block w-full bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white font-bold py-3 px-6 rounded-xl transition-all duration-200 text-center group-hover:bg-white group-hover:text-primary-900">
                            <i class="fas fa-info-circle mr-2"></i>View Details
                        </span>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center py-12">
                <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">No services available at the moment.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- Service Process --}}
<section class="py-16 md:py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Service Process</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                A streamlined approach to ensure your project is completed efficiently and to your satisfaction.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-primary-700 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">1</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Consultation</h3>
                <p class="text-gray-600">Initial discussion to understand your requirements and provide expert advice.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-primary-700 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">2</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Site Survey</h3>
                <p class="text-gray-600">Detailed on-site assessment and measurements for accurate quotation.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-primary-700 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">3</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Installation</h3>
                <p class="text-gray-600">Professional installation by our experienced technicians with minimal disruption.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-primary-700 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">4</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">After-Sales</h3>
                <p class="text-gray-600">Ongoing support, maintenance services, and warranty coverage.</p>
            </div>
        </div>
    </div>
</section>

{{-- Industries Served --}}
<section class="py-16 md:py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Industries We Serve</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Providing specialized solutions across various sectors in Singapore.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-lg transition-shadow">
                <div class="text-4xl mb-2">🏢</div>
                <div class="font-semibold text-gray-900">Commercial</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-lg transition-shadow">
                <div class="text-4xl mb-2">🏭</div>
                <div class="font-semibold text-gray-900">Industrial</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-lg transition-shadow">
                <div class="text-4xl mb-2">🏠</div>
                <div class="font-semibold text-gray-900">Residential</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-lg transition-shadow">
                <div class="text-4xl mb-2">🏪</div>
                <div class="font-semibold text-gray-900">Retail</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-lg transition-shadow">
                <div class="text-4xl mb-2">📦</div>
                <div class="font-semibold text-gray-900">Logistics</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-lg transition-shadow">
                <div class="text-4xl mb-2">🏥</div>
                <div class="font-semibold text-gray-900">Healthcare</div>
            </div>
        </div>
    </div>
</section>

{{-- Call to Action --}}
<section class="py-16 bg-gradient-to-r from-primary-700 to-primary-900 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Need Our Services?</h2>
        <p class="text-xl mb-8 text-primary-100 max-w-2xl mx-auto">
            Contact us today for a free consultation and competitive quotation.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:+6585445560" class="inline-flex items-center justify-center gap-2 bg-white text-primary-900 px-8 py-4 rounded-lg font-bold text-lg hover:bg-primary-50 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                Call Now
            </a>
            <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-white hover:text-primary-900 transition-colors">
                Get Free Quote
            </a>
        </div>
    </div>
</section>
@endsection
