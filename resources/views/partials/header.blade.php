<header class="bg-white shadow-md sticky top-0 z-40">
    {{-- Top Bar --}}
    <div class="bg-primary-800 text-white py-2">
        <div class="container mx-auto px-4">
            <div class="flex flex-col sm:flex-row justify-between items-center text-sm">
                <div class="flex flex-wrap justify-center sm:justify-start gap-4 mb-2 sm:mb-0">
                    <a href="tel:{{ str_replace(' ', '', setting('phone', '+6585445560')) }}" class="hover:text-primary-200 transition-colors flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        {{ setting('phone', '+65 8697 3181') }}
                    </a>
                    <a href="mailto:{{ setting('email', 'rollershutter14@gmail.com') }}" class="hover:text-primary-200 transition-colors flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        {{ setting('email', 'rollershutter14@gmail.com') }}
                    </a>
                </div>
                <div class="text-xs sm:text-sm">
                    {{ setting('business_hours', 'Mon-Fri: 9AM-6PM | Sat: 9AM-1PM') }}
                </div>
            </div>
        </div>
    </div>

    {{-- Main Navigation --}}
    <nav class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                <img src="{{ asset('images/logo.png') }}" 
                     alt="HTR ENGINEERING PTE LTD Logo" 
                     class="h-12 md:h-16 w-auto object-contain">
                <div class="hidden md:block">
                    <div class="font-bold text-primary-900 text-lg leading-tight">HTR ENGINEERING PTE LTD</div>
                    <div class="text-xs text-gray-600">Quality Engineering Solutions</div>
                </div>
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden lg:flex items-center space-x-8">
                <a href="{{ route('home') }}" 
                   class="text-gray-700 hover:text-primary-700 font-medium transition-colors {{ request()->routeIs('home') ? 'text-primary-700' : '' }}">
                    Home
                </a>
                <a href="{{ route('about') }}" 
                   class="text-gray-700 hover:text-primary-700 font-medium transition-colors {{ request()->routeIs('about') ? 'text-primary-700' : '' }}">
                    About Us
                </a>
                <a href="{{ route('services') }}" 
                   class="text-gray-700 hover:text-primary-700 font-medium transition-colors {{ request()->routeIs('services') ? 'text-primary-700' : '' }}">
                    Services
                </a>
                <a href="{{ route('gallery') }}" 
                   class="text-gray-700 hover:text-primary-700 font-medium transition-colors {{ request()->routeIs('gallery') ? 'text-primary-700' : '' }}">
                    Gallery
                </a>
                <a href="{{ route('contact') }}" 
                   class="bg-primary-700 text-white px-6 py-2 rounded-lg hover:bg-primary-800 transition-colors font-medium">
                    Contact Us
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <button id="mobile-menu-button" class="lg:hidden text-gray-700 hover:text-primary-700 focus:outline-none" aria-label="Toggle menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden lg:hidden mt-4 pb-4 space-y-2">
            <a href="{{ route('home') }}" 
               class="block px-4 py-2 text-gray-700 hover:bg-primary-50 hover:text-primary-700 rounded transition-colors {{ request()->routeIs('home') ? 'bg-primary-50 text-primary-700' : '' }}">
                Home
            </a>
            <a href="{{ route('about') }}" 
               class="block px-4 py-2 text-gray-700 hover:bg-primary-50 hover:text-primary-700 rounded transition-colors {{ request()->routeIs('about') ? 'bg-primary-50 text-primary-700' : '' }}">
                About Us
            </a>
            <a href="{{ route('services') }}" 
               class="block px-4 py-2 text-gray-700 hover:bg-primary-50 hover:text-primary-700 rounded transition-colors {{ request()->routeIs('services') ? 'bg-primary-50 text-primary-700' : '' }}">
                Services
            </a>
            <a href="{{ route('gallery') }}" 
               class="block px-4 py-2 text-gray-700 hover:bg-primary-50 hover:text-primary-700 rounded transition-colors {{ request()->routeIs('gallery') ? 'bg-primary-50 text-primary-700' : '' }}">
                Gallery
            </a>
            <a href="{{ route('contact') }}" 
               class="block px-4 py-2 bg-primary-700 text-white hover:bg-primary-800 rounded text-center transition-colors">
                Contact Us
            </a>
        </div>
    </nav>
</header>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
