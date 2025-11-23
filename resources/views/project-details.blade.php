@extends('layouts.app')

@section('title', $project->title . ' - Project Details | Roller Shutter & Construction')
@section('meta_description', $project->description)

@section('content')
{{-- Page Header --}}
<section class="bg-gradient-to-r from-primary-800 to-primary-900 text-white py-8 md:py-12">
    <div class="container mx-auto px-4">
        <nav class="text-xs mb-3">
            <ol class="flex items-center space-x-2 text-primary-200">
                <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                <li><span class="mx-1">/</span></li>
                <li><a href="{{ route('gallery') }}" class="hover:text-white">Gallery</a></li>
                <li><span class="mx-1">/</span></li>
                <li class="text-white">{{ $project->title }}</li>
            </ol>
        </nav>
        <h1 class="text-2xl md:text-3xl font-bold mb-3">{{ $project->title }}</h1>
        <div class="flex flex-wrap gap-3 text-sm text-primary-100">
            @if($project->location)
            <span class="flex items-center">
                <i class="fas fa-tag mr-1.5"></i>
                {{ $project->location }}
            </span>
            @endif
            @if($project->year)
            <span class="flex items-center">
                <i class="fas fa-calendar-alt mr-1.5"></i>
                {{ $project->year }}
            </span>
            @endif
        </div>
    </div>
</section>

{{-- Project Details Section --}}
<section class="py-16 md:py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Main Content --}}
            <div class="lg:col-span-2">
                {{-- Project Image --}}
                <div class="mb-8 rounded-lg overflow-hidden shadow-xl">
                    @if($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" 
                         alt="{{ $project->title }}" 
                         class="w-full h-auto object-cover"
                         onerror="this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'800\' height=\'600\'%3E%3Crect fill=\'%23e5e7eb\' width=\'800\' height=\'600\'/%3E%3Ctext fill=\'%239ca3af\' font-family=\'sans-serif\' font-size=\'24\' x=\'50%25\' y=\'50%25\' text-anchor=\'middle\' dominant-baseline=\'middle\'%3E{{ $project->title }}%3C/text%3E%3C/svg%3E'">
                    @else
                    <div class="w-full h-96 bg-gradient-to-br from-blue-100 to-primary-100 flex items-center justify-center">
                        <span class="text-9xl text-primary-400 font-bold">{{ substr($project->title, 0, 1) }}</span>
                    </div>
                    @endif
                </div>

                {{-- Project Description --}}
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Project Overview</h2>
                    <div class="prose prose-lg max-w-none text-gray-700">
                        <p>{{ $project->description }}</p>
                    </div>
                </div>


            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-1">
                {{-- Project Info Card --}}
                <div class="bg-gray-50 rounded-lg p-6 mb-6 shadow-md sticky top-4">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Project Information</h3>
                    <div class="space-y-4">
                        @if($project->location)
                        <div class="flex items-start">
                            <i class="fas fa-tag text-primary-600 mt-1 mr-3 w-5"></i>
                            <div>
                                <p class="text-sm text-gray-500">Category</p>
                                <p class="text-gray-900 font-semibold">{{ $project->location }}</p>
                            </div>
                        </div>
                        @endif
                        
                        @if($project->year)
                        <div class="flex items-start">
                            <i class="fas fa-calendar-alt text-primary-600 mt-1 mr-3 w-5"></i>
                            <div>
                                <p class="text-sm text-gray-500">Year Completed</p>
                                <p class="text-gray-900 font-semibold">{{ $project->year }}</p>
                            </div>
                        </div>
                        @endif
                        
                        <div class="flex items-start">
                            <i class="fas fa-tasks text-primary-600 mt-1 mr-3 w-5"></i>
                            <div>
                                <p class="text-sm text-gray-500">Status</p>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($project->status == 'Completed') bg-green-100 text-green-800
                                    @elseif($project->status == 'In Progress') bg-blue-100 text-blue-800
                                    @elseif($project->status == 'Planning') bg-yellow-100 text-yellow-800
                                    @elseif($project->status == 'On Hold') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ $project->status ?? 'Completed' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <a href="{{ route('contact') }}" class="block w-full bg-primary-700 hover:bg-primary-800 text-white text-center px-6 py-3 rounded-lg font-semibold transition-colors">
                            <i class="fas fa-envelope mr-2"></i>
                            Start Your Project
                        </a>
                    </div>
                </div>

                {{-- Share Section --}}
                <div class="bg-white rounded-lg p-6 shadow-md mb-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Share This Project</h3>
                    <div class="flex space-x-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('project.details', $project->id)) }}" 
                           target="_blank" 
                           class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 rounded-lg transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('project.details', $project->id)) }}&text={{ urlencode($project->title) }}" 
                           target="_blank" 
                           class="flex-1 bg-sky-500 hover:bg-sky-600 text-white text-center py-2 rounded-lg transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('project.details', $project->id)) }}" 
                           target="_blank" 
                           class="flex-1 bg-blue-700 hover:bg-blue-800 text-white text-center py-2 rounded-lg transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="whatsapp://send?text={{ urlencode($project->title . ' - ' . route('project.details', $project->id)) }}" 
                           target="_blank" 
                           class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 rounded-lg transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Related Projects Section --}}
@if($relatedProjects->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Related Projects</h2>
            <p class="text-xl text-gray-600">Explore more projects in the {{ $project->location }} category</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedProjects as $related)
            <a href="{{ route('project.details', $related->id) }}" class="group bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative overflow-hidden">
                    @if($related->image)
                    <img src="{{ asset('storage/' . $related->image) }}" 
                         alt="{{ $related->title }}" 
                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                         onerror="this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'400\' height=\'300\'%3E%3Crect fill=\'%23e5e7eb\' width=\'400\' height=\'300\'/%3E%3Ctext fill=\'%239ca3af\' font-family=\'sans-serif\' font-size=\'16\' x=\'50%25\' y=\'50%25\' text-anchor=\'middle\' dominant-baseline=\'middle\'%3E{{ $related->title }}%3C/text%3E%3C/svg%3E'">
                    @else
                    <div class="w-full h-64 bg-gradient-to-br from-blue-100 to-primary-100 flex items-center justify-center">
                        <span class="text-6xl text-primary-400 font-bold">{{ substr($related->title, 0, 1) }}</span>
                    </div>
                    @endif
                    <span class="absolute top-3 left-3 bg-primary-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                        {{ $related->location }}
                    </span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-primary-700 transition-colors">{{ $related->title }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ $related->description }}</p>
                    @if($related->year)
                    <p class="text-sm text-gray-500">
                        <i class="fas fa-calendar-alt mr-2"></i>{{ $related->year }}
                    </p>
                    @endif
                </div>
            </a>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('gallery') }}" class="inline-block bg-primary-700 hover:bg-primary-800 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                View All Projects
            </a>
        </div>
    </div>
</section>
@endif

{{-- Call to Action --}}
<section class="py-16 bg-gradient-to-r from-primary-700 to-primary-900 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Need a Similar Solution?</h2>
        <p class="text-xl mb-8 text-primary-100 max-w-2xl mx-auto">
            Contact us today to discuss your project requirements and get a free quote.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('contact') }}" class="inline-block bg-white text-primary-900 px-8 py-4 rounded-lg font-bold text-lg hover:bg-primary-50 transition-colors">
                Get Free Quote
            </a>
            <a href="tel:+6512345678" class="inline-block bg-primary-600 text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-primary-500 transition-colors">
                <i class="fas fa-phone mr-2"></i>
                Call Us Now
            </a>
        </div>
    </div>
</section>

@endsection
