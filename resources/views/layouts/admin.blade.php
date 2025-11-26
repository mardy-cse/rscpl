<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - HTR ENGINEERING PTE LTD</title>
    
    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    {{-- Custom Tailwind Config --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                    },
                }
            }
        }
    </script>
    
    <style>
        /* Prevent horizontal scroll on mobile */
        body {
            overflow-x: hidden;
        }
        
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Custom scrollbar for sidebar */
        #sidebar::-webkit-scrollbar {
            width: 6px;
        }
        
        #sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }
        
        #sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }
        
        #sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }
        
        /* Touch-friendly tap targets */
        @media (max-width: 768px) {
            a, button {
                min-height: 44px;
                display: flex;
                align-items: center;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-50 overflow-x-hidden">
    <div class="flex h-screen overflow-hidden">
        {{-- Sidebar --}}
        <aside id="sidebar" class="fixed md:static inset-y-0 left-0 z-50 w-64 sm:w-72 bg-gradient-to-b from-blue-900 to-blue-800 text-white flex-shrink-0 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out shadow-xl overflow-y-auto">
            <div class="p-4 sm:p-6 border-b border-blue-700">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.png') }}" 
                         alt="HTR ENGINEERING Logo" 
                         class="w-10 h-10 sm:w-12 sm:h-12 object-contain bg-white rounded-lg p-1 flex-shrink-0">
                    <div class="min-w-0">
                        <h2 class="text-sm sm:text-base font-bold leading-tight truncate">HTR ENGINEERING</h2>
                        <p class="text-xs text-blue-200 truncate">Admin Panel</p>
                    </div>
                </div>
            </div>
            
            <div class="p-3 sm:p-4 bg-blue-800 bg-opacity-50">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-white font-semibold text-xs sm:text-sm">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</span>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-xs sm:text-sm font-semibold truncate">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-blue-200 truncate">Administrator</p>
                    </div>
                </div>
            </div>
            
            <nav class="p-3 sm:p-4 pb-20 md:pb-4">
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="block px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-white text-blue-900 shadow-md' : 'hover:bg-blue-700 text-white' }}">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.projects.index') }}" 
                           class="block px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.projects.*') ? 'bg-white text-blue-900 shadow-md' : 'hover:bg-blue-700 text-white' }}">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                Projects
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.services.index') }}" 
                           class="block px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.services.*') ? 'bg-white text-blue-900 shadow-md' : 'hover:bg-blue-700 text-white' }}">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                Services
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.testimonials.index') }}" 
                           class="block px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.testimonials.*') ? 'bg-white text-blue-900 shadow-md' : 'hover:bg-blue-700 text-white' }}">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                Testimonials
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.about.index') }}" 
                           class="block px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.about.*') ? 'bg-white text-blue-900 shadow-md' : 'hover:bg-blue-700 text-white' }}">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                About Content
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.contacts.index') }}" 
                           class="block px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.contacts.*') ? 'bg-white text-blue-900 shadow-md' : 'hover:bg-blue-700 text-white' }}">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Contacts
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.policies.index') }}"
                           class="block px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.policies.*') ? 'bg-white text-blue-900 shadow-md' : 'hover:bg-blue-700 text-white' }}">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Policies
                            </span>
                        </a>
                    </li>
                    
                    {{-- Settings & User Section --}}
                    <li class="pt-3 mt-3">
                        <a href="{{ route('admin.settings.index') }}" 
                           class="block px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.settings.*') ? 'bg-white text-blue-900 shadow-md' : 'hover:bg-blue-700 text-white' }}">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Settings
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.profile.edit') }}"
                           class="block px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.profile.*') ? 'bg-white text-blue-900 shadow-md' : 'hover:bg-blue-700 text-white' }}">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Profile
                            </span>
                        </a>
                    </li>
                    
                    {{-- Footer Section --}}
                    <li class="pt-4 mt-4 border-t border-blue-700">
                        <a href="{{ route('home') }}" target="_blank"
                           class="block px-4 py-3 rounded-lg transition-all duration-200 hover:bg-blue-700 text-white">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                View Website
                            </span>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left block px-4 py-3 rounded-lg transition-all duration-200 hover:bg-red-600 text-white">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Logout
                                </span>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Top Bar --}}
            <header class="bg-white border-b border-gray-200 shadow-sm z-10 sticky top-0">
                <div class="flex items-center justify-between px-3 sm:px-4 lg:px-6 py-3 sm:py-4">
                    <div class="flex items-center min-w-0 flex-1">
                        <button id="sidebar-toggle" class="md:hidden mr-2 sm:mr-4 text-gray-600 hover:text-blue-600 p-2 -ml-2 flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <div class="min-w-0 flex-1">
                            <h1 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-800 truncate">@yield('page-title', 'Dashboard')</h1>
                            <p class="text-xs sm:text-sm text-gray-500 hidden sm:block">HTR ENGINEERING PTE LTD<br class="hidden lg:block"><small class="text-xs">GST/UEN: 20154246D</small></p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 sm:space-x-4 flex-shrink-0">
                        <div class="hidden lg:block text-right">
                            <p class="text-sm font-medium text-gray-700 truncate max-w-xs">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500 truncate max-w-xs">{{ auth()->user()->email }}</p>
                        </div>
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-semibold text-xs sm:text-sm">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</span>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 overflow-y-auto p-3 sm:p-4 lg:p-6">
                {{-- Success Message --}}
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-3 sm:px-4 py-2 sm:py-3 rounded mb-3 sm:mb-4 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Error Message --}}
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-3 sm:px-4 py-2 sm:py-3 rounded mb-3 sm:mb-4 text-sm">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Validation Errors --}}
                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-3 sm:px-4 py-2 sm:py-3 rounded mb-3 sm:mb-4 text-sm">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    {{-- Mobile Sidebar Overlay --}}
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden opacity-0 pointer-events-none transition-opacity duration-300"></div>

    <script>
        // Mobile sidebar toggle with smooth animations
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarOverlay = document.getElementById('sidebar-overlay');
        let isSidebarOpen = false;

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
            sidebarOverlay.classList.add('opacity-100');
            document.body.style.overflow = 'hidden';
            isSidebarOpen = true;
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('translate-x-0');
            sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
            sidebarOverlay.classList.remove('opacity-100');
            document.body.style.overflow = '';
            isSidebarOpen = false;
        }

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                if (isSidebarOpen) {
                    closeSidebar();
                } else {
                    openSidebar();
                }
            });

            sidebarOverlay.addEventListener('click', closeSidebar);

            // Close sidebar on ESC key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && isSidebarOpen) {
                    closeSidebar();
                }
            });

            // Close sidebar when clicking menu items on mobile
            const menuLinks = sidebar.querySelectorAll('a');
            menuLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 768) {
                        closeSidebar();
                    }
                });
            });
            
            // Handle window resize
            let resizeTimer;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(() => {
                    if (window.innerWidth >= 768 && isSidebarOpen) {
                        closeSidebar();
                    }
                }, 250);
            });
        }

        // Auto-hide alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.bg-green-100.border, .bg-red-100.border, [role="alert"]');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
        
        // Prevent zoom on double tap for iOS
        let lastTouchEnd = 0;
        document.addEventListener('touchend', (event) => {
            const now = Date.now();
            if (now - lastTouchEnd <= 300) {
                event.preventDefault();
            }
            lastTouchEnd = now;
        }, false);
        
        // Add loading state to all forms
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn && !submitBtn.disabled) {
                        submitBtn.disabled = true;
                        const originalText = submitBtn.innerHTML;
                        submitBtn.innerHTML = `
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Processing...
                        `;
                    }
                });
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
