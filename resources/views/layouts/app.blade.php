<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- SEO Meta Tags --}}
    <title>@yield('title', 'Roller Shutter & Construction Pte. Ltd. - Singapore')</title>
    <meta name="description" content="@yield('meta_description', 'Professional roller shutters, security grilles, automatic gates and doors in Singapore. Quality construction services with over 15 years of experience.')">
    <meta name="keywords" content="roller shutters singapore, security grilles, automatic gates, automatic doors, metal works, construction singapore">
    <meta name="author" content="Roller Shutter & Construction Pte. Ltd.">
    <link rel="canonical" href="@yield('canonical', url()->current())">
    
    {{-- Open Graph Tags --}}
    <meta property="og:title" content="@yield('og_title', 'Roller Shutter & Construction Pte. Ltd.')">
    <meta property="og:description" content="@yield('og_description', 'Professional roller shutters, security grilles, automatic gates and doors in Singapore.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta property="og:locale" content="en_SG">
    <meta property="og:site_name" content="Roller Shutter & Construction Pte. Ltd.">
    
    {{-- Twitter Card Tags --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'Roller Shutter & Construction Pte. Ltd.')">
    <meta name="twitter:description" content="@yield('og_description', 'Professional roller shutters, security grilles, automatic gates and doors in Singapore.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    
    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- Tailwind Custom Configuration --}}
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
    
    {{-- Custom Styles --}}
    <style>
        @media (prefers-reduced-motion: no-preference) {
            html {
                scroll-behavior: smooth;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50">
    {{-- Header / Navigation --}}
    @include('partials.header')
    
    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>
    
    {{-- Footer --}}
    @include('partials.footer')
    
    {{-- Floating WhatsApp Button --}}
    <a href="https://wa.me/6585445560" 
       target="_blank" 
       rel="noopener noreferrer"
       class="fixed bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white rounded-full p-4 shadow-lg transition-all duration-300 hover:scale-110 z-50"
       aria-label="Contact us on WhatsApp">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
        </svg>
    </a>
    
    {{-- Scripts --}}
    @stack('scripts')
    
    {{-- Structured Data (JSON-LD) --}}
    <script type="application/ld+json">
    @php
    echo json_encode([
        "@context" => "https://schema.org",
        "@type" => "LocalBusiness",
        "name" => "Roller Shutter & Construction Pte. Ltd.",
        "image" => asset('images/logo.png'),
        "description" => "Professional roller shutters, security grilles, automatic gates and doors installation services in Singapore.",
        "address" => [
            "@type" => "PostalAddress",
            "streetAddress" => "66 Tannery Lane #01-03D Sindo Building",
            "addressLocality" => "Singapore",
            "postalCode" => "347805",
            "addressCountry" => "SG"
        ],
        "geo" => [
            "@type" => "GeoCoordinates",
            "latitude" => 1.3274,
            "longitude" => 103.8779
        ],
        "url" => url('/'),
        "telephone" => "+6585445560",
        "email" => "rollershutter14@gmail.com",
        "priceRange" => "$$",
        "openingHoursSpecification" => [
            [
                "@type" => "OpeningHoursSpecification",
                "dayOfWeek" => ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                "opens" => "09:00",
                "closes" => "18:00"
            ],
            [
                "@type" => "OpeningHoursSpecification",
                "dayOfWeek" => "Saturday",
                "opens" => "09:00",
                "closes" => "13:00"
            ]
        ],
        "areaServed" => [
            "@type" => "Country",
            "name" => "Singapore"
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    @endphp
    </script>
</body>
</html>
