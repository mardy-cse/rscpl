@extends('layouts.app')

@section('title', 'Gallery - Our Projects | Roller Shutter & Construction')
@section('meta_description', 'View our portfolio of completed roller shutter, security grilles, automatic gates installations across commercial, industrial and residential projects in Singapore.')

@section('content')
{{-- Page Header --}}
<section class="bg-gradient-to-r from-primary-800 to-primary-900 text-white py-16 md:py-20">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Project Gallery</h1>
        <p class="text-xl text-primary-100 max-w-3xl">
            Browse through our completed projects and see the quality of our workmanship.
        </p>
    </div>
</section>

{{-- Gallery Section --}}
<section class="py-16 md:py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        {{-- Category Filter --}}
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            @foreach($categories as $category)
            <button class="filter-btn px-6 py-2 rounded-full font-semibold transition-all duration-300 {{ $category === 'All' ? 'bg-primary-700 text-white' : 'bg-white text-gray-700 hover:bg-primary-50' }}" 
                    data-category="{{ $category }}">
                {{ $category }}
            </button>
            @endforeach
        </div>

        {{-- Gallery Grid --}}
        <div id="gallery-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
            <div class="gallery-item {{ $project['category'] }} bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 cursor-pointer" 
                 data-category="{{ $project['category'] }}"
                 onclick="openLightbox('{{ asset('storage/' . $project['image']) }}', '{{ $project['title'] }}', '{{ $project['description'] }}')">
                <div class="relative overflow-hidden group">
                    <img src="{{ asset('storage/' . $project['image']) }}" 
                         alt="{{ $project['title'] }}" 
                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                         onerror="this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'400\' height=\'300\'%3E%3Crect fill=\'%23e5e7eb\' width=\'400\' height=\'300\'/%3E%3Ctext fill=\'%239ca3af\' font-family=\'sans-serif\' font-size=\'16\' x=\'50%25\' y=\'50%25\' text-anchor=\'middle\' dominant-baseline=\'middle\'%3E{{ $project['title'] }}%3C/text%3E%3C/svg%3E'">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 flex items-center justify-center">
                        <svg class="w-12 h-12 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                        </svg>
                    </div>
                    <span class="absolute top-3 left-3 bg-primary-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                        {{ $project['category'] }}
                    </span>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $project['title'] }}</h3>
                    <p class="text-sm text-gray-600">{{ $project['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- No Results Message --}}
        <div id="no-results" class="hidden text-center py-12">
            <svg class="w-24 h-24 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <p class="text-xl text-gray-600">No projects found in this category.</p>
        </div>
    </div>
</section>

{{-- Lightbox Modal --}}
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden items-center justify-center p-4">
    <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white hover:text-gray-300 transition-colors z-10">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
    
    <div class="max-w-5xl w-full">
        <img id="lightbox-image" src="" alt="" class="w-full h-auto rounded-lg shadow-2xl mb-4">
        <div class="text-white text-center">
            <h3 id="lightbox-title" class="text-2xl font-bold mb-2"></h3>
            <p id="lightbox-description" class="text-gray-300"></p>
        </div>
    </div>
</div>

{{-- Call to Action --}}
<section class="py-16 bg-gradient-to-r from-primary-700 to-primary-900 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Want Your Project Featured Here?</h2>
        <p class="text-xl mb-8 text-primary-100 max-w-2xl mx-auto">
            Let's discuss your requirements and create something amazing together.
        </p>
        <a href="{{ route('contact') }}" class="inline-block bg-white text-primary-900 px-8 py-4 rounded-lg font-bold text-lg hover:bg-primary-50 transition-colors">
            Start Your Project
        </a>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Category Filter
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Update active button
            document.querySelectorAll('.filter-btn').forEach(b => {
                b.classList.remove('bg-primary-700', 'text-white');
                b.classList.add('bg-white', 'text-gray-700');
            });
            this.classList.remove('bg-white', 'text-gray-700');
            this.classList.add('bg-primary-700', 'text-white');
            
            // Filter items
            const items = document.querySelectorAll('.gallery-item');
            let visibleCount = 0;
            
            items.forEach(item => {
                if (category === 'All' || item.getAttribute('data-category') === category) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Show/hide no results message
            const noResults = document.getElementById('no-results');
            if (visibleCount === 0) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        });
    });

    // Lightbox Functions
    function openLightbox(imageSrc, title, description) {
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightbox-image');
        const lightboxTitle = document.getElementById('lightbox-title');
        const lightboxDescription = document.getElementById('lightbox-description');
        
        lightboxImage.src = imageSrc;
        lightboxTitle.textContent = title;
        lightboxDescription.textContent = description;
        
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        const lightbox = document.getElementById('lightbox');
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    // Close lightbox on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    });

    // Close lightbox on background click
    document.getElementById('lightbox').addEventListener('click', function(e) {
        if (e.target === this) {
            closeLightbox();
        }
    });
</script>
@endpush
