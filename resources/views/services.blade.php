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
        @forelse($services as $index => $service)
        <div class="mb-16 last:mb-0">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                    {{-- Content --}}
                    <div class="p-8 md:p-12 {{ $index % 2 === 0 ? 'lg:order-1' : 'lg:order-2' }}">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="bg-primary-100 p-3 rounded-lg">
                                @if($service->icon)
                                    <i class="{{ $service->icon }} text-3xl text-primary-700"></i>
                                @else
                                    <i class="fas fa-cog text-3xl text-primary-700"></i>
                                @endif
                            </div>
                            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">{{ $service->title }}</h2>
                        </div>
                        
                        <p class="text-xl text-primary-700 font-semibold mb-4">{{ $service->description }}</p>
                        
                        @if($service->details)
                        <p class="text-gray-600 mb-6 leading-relaxed">{{ $service->details }}</p>
                        @endif
                        
                        @if($service->features && count($service->features) > 0)
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Key Features:</h3>
                        <ul class="space-y-3 mb-8">
                            @foreach($service->features as $feature)
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-gray-700">{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        
                        <a href="{{ route('contact') }}" class="inline-block bg-primary-700 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-800 transition-colors">
                            Request Quote
                        </a>
                    </div>
                    
                    {{-- Image --}}
                    <div class="bg-gradient-to-br from-primary-100 to-blue-100 flex items-center justify-center p-8 {{ $index % 2 === 0 ? 'lg:order-2' : 'lg:order-1' }}">
                        @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" 
                             alt="{{ $service->title }}" 
                             class="rounded-lg shadow-lg w-full h-full object-cover max-h-96">
                        @else
                        <div class="w-full h-64 bg-gradient-to-br from-blue-100 to-primary-100 rounded-lg flex items-center justify-center">
                            @if($service->icon)
                                <i class="{{ $service->icon }} text-8xl text-primary-400"></i>
                            @else
                                <i class="fas fa-cog text-8xl text-primary-400"></i>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg">No services available at the moment.</p>
        </div>
        @endforelse
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
