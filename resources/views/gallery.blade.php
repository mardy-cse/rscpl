@extends('layouts.app')

@section('title', 'Gallery - Our Projects | HTR ENGINEERING PTE LTD')
@section('meta_description', 'View our portfolio of completed roller shutter, security grilles, automatic gates installations across commercial, industrial and residential projects in Singapore.')

@section('content')
{{-- Page Header --}}
<section class="bg-gradient-to-r from-primary-800 to-primary-900 text-white py-8 md:py-12">
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
            <div class="gallery-item {{ $project['category'] }} bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" 
                 data-category="{{ $project['category'] }}">
                <div class="relative overflow-hidden group cursor-pointer" 
                     onclick="openLightbox({{ $loop->index }})">
                    @if(isset($project['image']) && $project['image'])
                    <img src="{{ asset('storage/' . $project['image']) }}" 
                         alt="{{ $project['title'] }}" 
                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500 lightbox-img"
                         data-index="{{ $loop->index }}"
                         data-title="{{ $project['title'] }}"
                         data-description="{{ $project['description'] }}"
                         onerror="this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'400\' height=\'300\'%3E%3Crect fill=\'%23e5e7eb\' width=\'400\' height=\'300\'/%3E%3Ctext fill=\'%239ca3af\' font-family=\'sans-serif\' font-size=\'16\' x=\'50%25\' y=\'50%25\' text-anchor=\'middle\' dominant-baseline=\'middle\'%3E{{ $project['title'] }}%3C/text%3E%3C/svg%3E'">
                    @else
                    <div class="w-full h-64 bg-gradient-to-br from-blue-100 to-primary-100 flex items-center justify-center">
                        <span class="text-6xl text-primary-400 font-bold">{{ substr($project['title'], 0, 1) }}</span>
                    </div>
                    @endif
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 flex items-center justify-center">
                        <div class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center">
                            <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <span class="text-sm font-semibold">View Image</span>
                        </div>
                    </div>
                    <span class="absolute top-3 left-3 bg-primary-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                        {{ $project['category'] }}
                    </span>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $project['title'] }}</h3>
                    <p class="text-sm text-gray-600 mb-2 line-clamp-2">{{ $project['description'] }}</p>
                    <div class="flex items-center justify-between">
                        @if(isset($project['year']) && $project['year'])
                        <p class="text-xs text-gray-500">
                            <i class="fas fa-calendar-alt mr-1"></i>{{ $project['year'] }}
                        </p>
                        @endif
                        <a href="{{ route('project.details', $project['id']) }}" 
                           class="text-primary-700 hover:text-primary-800 text-sm font-semibold flex items-center gap-1">
                            View Details
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- No Results Message --}}
        <div id="no-results" class="hidden text-center py-16">
            <div class="bg-white rounded-lg shadow-lg p-8 max-w-md mx-auto">
                <svg class="w-20 h-20 mx-auto text-primary-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">No Projects Found</h3>
                <p class="text-gray-600 mb-4">There are no projects in <span id="category-name" class="font-semibold text-primary-700"></span> category yet.</p>
                <p class="text-sm text-gray-500">Please check back later or browse other categories.</p>
            </div>
        </div>
    </div>
</section>

{{-- Lightbox Modal --}}
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-95 z-50 hidden flex items-center justify-center p-4">
    <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white hover:text-gray-300 transition-colors z-10">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
    
    <button onclick="previousImage()" class="absolute left-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 transition-colors bg-black bg-opacity-50 rounded-full p-3">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>
    
    <button onclick="nextImage()" class="absolute right-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 transition-colors bg-black bg-opacity-50 rounded-full p-3">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </button>
    
    <div class="max-w-6xl w-full">
        <img id="lightbox-img" src="" alt="" class="w-full h-auto max-h-[80vh] object-contain mx-auto">
        <div class="text-white mt-4 text-center">
            <h3 id="lightbox-title" class="text-2xl font-bold mb-2"></h3>
            <p id="lightbox-description" class="text-gray-300"></p>
            <p id="lightbox-counter" class="text-sm text-gray-400 mt-2"></p>
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
    let currentImageIndex = 0;
    let allImages = [];
    let visibleImages = [];
    
    // Initialize images array
    document.addEventListener('DOMContentLoaded', function() {
        updateImagesList();
    });
    
    function updateImagesList() {
        allImages = Array.from(document.querySelectorAll('.lightbox-img'));
        visibleImages = allImages.filter(img => img.closest('.gallery-item').style.display !== 'none');
    }
    
    function openLightbox(index) {
        updateImagesList();
        currentImageIndex = index;
        
        const img = visibleImages[currentImageIndex];
        if (!img) return;
        
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxTitle = document.getElementById('lightbox-title');
        const lightboxDescription = document.getElementById('lightbox-description');
        const lightboxCounter = document.getElementById('lightbox-counter');
        
        lightboxImg.src = img.src;
        lightboxTitle.textContent = img.getAttribute('data-title');
        lightboxDescription.textContent = img.getAttribute('data-description');
        lightboxCounter.textContent = `${currentImageIndex + 1} / ${visibleImages.length}`;
        
        lightbox.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    function closeLightbox() {
        const lightbox = document.getElementById('lightbox');
        lightbox.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
    
    function previousImage() {
        currentImageIndex = (currentImageIndex - 1 + visibleImages.length) % visibleImages.length;
        updateLightboxImage();
    }
    
    function nextImage() {
        currentImageIndex = (currentImageIndex + 1) % visibleImages.length;
        updateLightboxImage();
    }
    
    function updateLightboxImage() {
        const img = visibleImages[currentImageIndex];
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxTitle = document.getElementById('lightbox-title');
        const lightboxDescription = document.getElementById('lightbox-description');
        const lightboxCounter = document.getElementById('lightbox-counter');
        
        lightboxImg.src = img.src;
        lightboxTitle.textContent = img.getAttribute('data-title');
        lightboxDescription.textContent = img.getAttribute('data-description');
        lightboxCounter.textContent = `${currentImageIndex + 1} / ${visibleImages.length}`;
    }
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        const lightbox = document.getElementById('lightbox');
        if (!lightbox.classList.contains('hidden')) {
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowLeft') previousImage();
            if (e.key === 'ArrowRight') nextImage();
        }
    });
    
    // Close on background click
    document.getElementById('lightbox').addEventListener('click', function(e) {
        if (e.target === this) closeLightbox();
    });

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
            
            // Update visible images list
            updateImagesList();
            
            // Show/hide no results message with category name
            const noResults = document.getElementById('no-results');
            const categoryName = document.getElementById('category-name');
            
            if (visibleCount === 0) {
                categoryName.textContent = category === 'All' ? 'any' : category;
                noResults.classList.remove('hidden');
                document.getElementById('gallery-grid').classList.add('hidden');
            } else {
                noResults.classList.add('hidden');
                document.getElementById('gallery-grid').classList.remove('hidden');
            }
        });
    });

</script>
@endpush
