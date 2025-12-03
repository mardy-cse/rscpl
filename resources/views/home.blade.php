@extends('layouts.app')

@section('title', 'Home - HTR ENGINEERING PTE LTD Singapore')
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
                <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm px-5 py-4 rounded-xl border border-white/20">
                    <div class="bg-white text-primary-900 p-3 rounded-full flex-shrink-0">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-bold text-2xl text-white">15+ Years</div>
                        <div class="text-sm text-primary-100 font-medium">Experience</div>
                    </div>
                </div>
                <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm px-5 py-4 rounded-xl border border-white/20">
                    <div class="bg-white text-primary-900 p-3 rounded-full flex-shrink-0">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-bold text-2xl text-white">500+</div>
                        <div class="text-sm text-primary-100 font-medium">Happy Clients</div>
                    </div>
                </div>
                <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm px-5 py-4 rounded-xl border border-white/20">
                    <div class="bg-white text-primary-900 p-3 rounded-full flex-shrink-0">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-bold text-2xl text-white">24/7</div>
                        <div class="text-sm text-primary-100 font-medium">Support</div>
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
<section class="py-12 md:py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Comprehensive solutions for all your roller shutter, security, and construction needs in Singapore.
            </p>
        </div>

        <div class="slider-container">
            <div class="slider-wrapper">
                <div id="servicesSlider" class="slider-track">
                    {{-- Services will be rendered by JavaScript slider --}}
                </div>
            </div>
            {{-- Navigation Arrows --}}
            <button id="servicesSlider-prev" class="slider-arrows prev bg-white/90 hover:bg-white text-blue-900 rounded-full shadow-lg hover:shadow-xl transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button id="servicesSlider-next" class="slider-arrows next bg-white/90 hover:bg-white text-blue-900 rounded-full shadow-lg hover:shadow-xl transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('services') }}" class="inline-block bg-primary-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-800 transition-colors">
                View All Services
            </a>
        </div>
    </div>
</section>

{{-- Latest Projects Section --}}
<section class="py-12 md:py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Latest Projects</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Explore our recent installations and see the quality craftsmanship we deliver.
            </p>
        </div>

        <div class="slider-container">
            <div class="slider-wrapper">
                <div id="projectsSlider" class="slider-track">
                    {{-- Projects will be rendered by JavaScript slider --}}
                </div>
            </div>
            {{-- Navigation Arrows --}}
            <button id="projectsSlider-prev" class="slider-arrows prev bg-white/90 hover:bg-white text-blue-900 rounded-full shadow-lg hover:shadow-xl transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button id="projectsSlider-next" class="slider-arrows next bg-white/90 hover:bg-white text-blue-900 rounded-full shadow-lg hover:shadow-xl transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('gallery') }}" class="inline-block bg-gray-900 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-800 transition-colors">
                View Full Gallery
            </a>
        </div>
    </div>
</section>

{{-- Testimonials Section --}}
<section class="py-12 md:py-16 bg-gradient-to-br from-primary-50 to-blue-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Our Clients Say</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Don't just take our word for it - hear from our satisfied customers.
            </p>
        </div>

        <div class="slider-container">
            <div class="slider-wrapper">
                <div id="testimonialsSlider" class="slider-track">
                    {{-- Testimonials will be rendered by JavaScript slider --}}
                </div>
            </div>
            {{-- Navigation Arrows --}}
            <button id="testimonialsSlider-prev" class="slider-arrows prev bg-white hover:bg-gray-50 text-gray-900 rounded-full shadow-lg hover:shadow-xl transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button id="testimonialsSlider-next" class="slider-arrows next bg-white hover:bg-gray-50 text-gray-900 rounded-full shadow-lg hover:shadow-xl transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
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

{{-- Slider CSS --}}
<style>
.slider-container {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 60px;
}

.slider-container.centered {
    display: flex;
    justify-content: center;
    padding: 0 20px;
}

.slider-wrapper {
    overflow: hidden;
    position: relative;
    width: 100%;
    padding: 0 4px;
}

.slider-track {
    display: flex;
    transition: transform 0.5s ease;
    gap: 24px;
    width: 100%;
}

.slider-card {
    flex: 0 0 calc((100% - 48px) / 3);
    box-sizing: border-box;
    max-width: calc((100% - 48px) / 3);
}

.slider-arrows {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    border: none;
    cursor: pointer;
    display: none;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.slider-arrows.visible {
    display: flex;
}

.slider-arrows:hover {
    background: white;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
}

.slider-arrows.prev {
    left: 10px;
}

.slider-arrows.next {
    right: 10px;
}

.slider-arrows svg {
    width: 20px;
    height: 20px;
    color: #374151;
}

.slider-arrows:disabled {
    opacity: 0.3;
    cursor: not-allowed;
}

@media (max-width: 1024px) {
    .slider-card {
        flex: 0 0 calc((100% - 24px) / 2);
        max-width: calc((100% - 24px) / 2);
    }
}

@media (max-width: 768px) {
    .slider-container {
        padding: 0 20px;
    }
    
    .slider-card {
        flex: 0 0 100%;
        max-width: 100%;
    }
    
    .slider-arrows {
        display: none !important;
    }
}
</style>

{{-- Auto Slider JavaScript --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Helper functions
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text || '';
        return div.innerHTML;
    }

    function imageUrl(path) {
        if (!path) return '';
        return '{{ url('') }}/uploads/' + path;
    }

    // Responsive Slider Configuration
    function getVisibleCards() {
        if (window.innerWidth <= 768) return 1; // Mobile
        if (window.innerWidth <= 1024) return 2; // Tablet
        return 3; // Desktop
    }

    function getGapSize(maxVisible) {
        return 24 * (maxVisible - 1);
    }

    // Universal Slider Function
    function initializeSlider(sliderId, data, renderCardFn) {
        const container = document.getElementById(sliderId);
        if (!container || !data || data.length === 0) return;

        const sliderContainer = container.closest('.slider-container');
        const prevBtn = document.getElementById(`${sliderId}-prev`);
        const nextBtn = document.getElementById(`${sliderId}-next`);
        
        let currentIndex = 0;
        let maxVisible = getVisibleCards();
        let autoSlideInterval;
        
        // Touch/Swipe variables
        let touchStartX = 0;
        let touchEndX = 0;
        let touchStartY = 0;
        let touchEndY = 0;
        let isDragging = false;

        function renderCards() {
            container.innerHTML = data.map(item => renderCardFn(item)).join('');
        }

        function updateSliderPosition() {
            maxVisible = getVisibleCards();
            const gapSize = getGapSize(maxVisible);
            const cardWidthPercent = (100 - (gapSize / container.parentElement.offsetWidth * 100)) / maxVisible;
            const gapPercent = (24 / container.parentElement.offsetWidth * 100);
            const movePercent = cardWidthPercent + gapPercent;
            const translateX = -(currentIndex * movePercent);
            container.style.transform = `translateX(${translateX}%)`;
            updateNavigationState();
        }

        function updateNavigationState() {
            if (!prevBtn || !nextBtn) return;
            const totalSlides = Math.max(0, data.length - maxVisible);
            if (data.length <= maxVisible) {
                prevBtn.classList.remove('visible');
                nextBtn.classList.remove('visible');
                if (sliderContainer) sliderContainer.classList.add('centered');
            } else {
                prevBtn.classList.add('visible');
                nextBtn.classList.add('visible');
                if (sliderContainer) sliderContainer.classList.remove('centered');
                prevBtn.disabled = currentIndex === 0;
                nextBtn.disabled = currentIndex >= totalSlides;
            }
        }

        function goToPrev() {
            if (currentIndex > 0) {
                currentIndex--;
                updateSliderPosition();
                resetAutoSlide();
            }
        }

        function goToNext() {
            maxVisible = getVisibleCards();
            if (currentIndex < data.length - maxVisible) {
                currentIndex++;
                updateSliderPosition();
                resetAutoSlide();
            }
        }

        if (prevBtn && nextBtn) {
            prevBtn.addEventListener('click', goToPrev);
            nextBtn.addEventListener('click', goToNext);
        }

        // Touch event handlers
        function handleTouchStart(e) {
            touchStartX = e.touches[0].clientX;
            touchStartY = e.touches[0].clientY;
            isDragging = true;
            container.style.transition = 'none';
            clearInterval(autoSlideInterval);
        }

        function handleTouchMove(e) {
            if (!isDragging) return;
            touchEndX = e.touches[0].clientX;
            touchEndY = e.touches[0].clientY;
            
            const diffX = Math.abs(touchEndX - touchStartX);
            const diffY = Math.abs(touchEndY - touchStartY);
            
            // Only prevent default if horizontal swipe is dominant
            if (diffX > diffY && diffX > 10) {
                e.preventDefault();
            }
        }

        function handleTouchEnd() {
            if (!isDragging) return;
            isDragging = false;
            container.style.transition = 'transform 0.5s ease';
            
            const diffX = touchStartX - touchEndX;
            const diffY = Math.abs(touchStartY - touchEndY);
            const threshold = 50;
            
            // Only register as swipe if horizontal movement is dominant
            if (Math.abs(diffX) > threshold && Math.abs(diffX) > diffY) {
                if (diffX > 0) {
                    // Swiped left, go next
                    goToNext();
                } else {
                    // Swiped right, go prev
                    goToPrev();
                }
            } else {
                // Snap back to current position
                updateSliderPosition();
                startAutoSlide();
            }
            
            touchStartX = 0;
            touchEndX = 0;
        }

        // Add touch event listeners
        if (container.parentElement) {
            const wrapper = container.parentElement;
            wrapper.addEventListener('touchstart', handleTouchStart, { passive: false });
            wrapper.addEventListener('touchmove', handleTouchMove, { passive: false });
            wrapper.addEventListener('touchend', handleTouchEnd);
        }

        function startAutoSlide() {
            if (data.length <= maxVisible) return;
            autoSlideInterval = setInterval(function() {
                maxVisible = getVisibleCards();
                if (currentIndex >= data.length - maxVisible) {
                    currentIndex = 0;
                } else {
                    currentIndex++;
                }
                updateSliderPosition();
            }, 4000);
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function() {
                const oldMaxVisible = maxVisible;
                maxVisible = getVisibleCards();
                if (oldMaxVisible !== maxVisible) {
                    const maxIndex = Math.max(0, data.length - maxVisible);
                    if (currentIndex > maxIndex) currentIndex = maxIndex;
                    updateSliderPosition();
                }
            }, 250);
        });

        renderCards();
        updateSliderPosition();
        startAutoSlide();
    }

    // Services Slider
    const servicesData = @json($services);
    initializeSlider('servicesSlider', servicesData, function(service) {
        return `
                <div class="slider-card group relative bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    ${service.image ? `
                        <div class="absolute inset-0 z-0">
                            <img src="${imageUrl(service.image)}" 
                                 alt="${escapeHtml(service.title)}" 
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/75 to-black/40"></div>
                        </div>
                    ` : `
                        <div class="absolute inset-0 z-0 bg-gradient-to-br from-blue-700 to-blue-900"></div>
                    `}
                    <div class="relative z-10 p-6 flex flex-col h-full min-h-[320px]">
                        <div class="mb-4">
                            <div class="w-16 h-16 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <i class="${service.icon || 'fas fa-cog'} text-4xl text-white"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <h3 class="text-2xl font-bold text-white mb-3">${escapeHtml(service.title)}</h3>
                            <p class="text-gray-200 text-sm leading-relaxed mb-4">${escapeHtml(service.description)}</p>
                        </div>
                        <div class="pt-4 border-t border-white/20">
                            <span class="text-white font-semibold group-hover:text-blue-300 transition-colors inline-flex items-center">
                                Learn More
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            `;
    });

    // Projects Slider
    const projectsData = @json($projects);
    initializeSlider('projectsSlider', projectsData, function(project) {
        return `
            <div class="slider-card group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                ${project.image ? `
                    <img src="${imageUrl(project.image)}" 
                         alt="${escapeHtml(project.title)}" 
                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                ` : `
                    <div class="w-full h-64 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                        <span class="text-4xl text-blue-400 font-bold">${escapeHtml(project.title.charAt(0))}</span>
                    </div>
                `}
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-6 group-hover:translate-y-0 transition-transform duration-300">
                    <span class="inline-block bg-blue-600 px-3 py-1 rounded-full text-xs font-semibold mb-2">
                        ${escapeHtml(project.category || 'Project')}
                    </span>
                    <h3 class="text-xl font-bold mb-2">${escapeHtml(project.title)}</h3>
                    <p class="text-sm text-gray-200 opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                        ${escapeHtml(project.description || '')}
                    </p>
                </div>
            </div>
        `;
    });

    // Testimonials Slider
    const testimonialsData = @json($testimonials);
    initializeSlider('testimonialsSlider', testimonialsData, function(testimonial) {
        return `
            <div class="slider-card bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow">
                <div class="flex gap-1 mb-4">
                    ${Array(parseInt(testimonial.rating || 5)).fill().map(() => `
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    `).join('')}
                </div>
                <p class="text-gray-600 mb-6 italic">"${escapeHtml(testimonial.content || testimonial.message || '')}"</p>
                <div class="flex items-center gap-4">
                    ${testimonial.avatar ? `
                        <img src="${imageUrl(testimonial.avatar)}" 
                             alt="${escapeHtml(testimonial.name)}" 
                             class="w-12 h-12 rounded-full object-cover">
                    ` : `
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white font-bold text-lg">
                            ${escapeHtml(testimonial.name.charAt(0))}
                        </div>
                    `}
                    <div>
                        <div class="font-bold text-gray-900">${escapeHtml(testimonial.name)}</div>
                        <div class="text-sm text-gray-500">${escapeHtml(testimonial.company || '')}</div>
                    </div>
                </div>
            </div>
        `;
    });
});
</script>
@endsection
