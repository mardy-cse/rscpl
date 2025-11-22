<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReceived;

class PageController extends Controller
{
    /**
     * Display the about page.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Display the services page.
     *
     * @return \Illuminate\View\View
     */
    public function services()
    {
        // All services with detailed information
        $services = [
            [
                'id' => 'roller-shutters',
                'title' => 'Roller Shutters',
                'description' => 'Premium quality roller shutters designed for maximum security and durability.',
                'details' => 'Our roller shutters are manufactured using high-grade materials to withstand harsh weather conditions and provide excellent security. Available in manual and motorized options, suitable for commercial warehouses, retail shops, factories, and residential properties.',
                'features' => [
                    'Heavy-duty aluminum or steel construction',
                    'Manual and motorized options available',
                    'Weather-resistant powder coating',
                    'Custom sizes and colors',
                    'Remote control operation (motorized)',
                    'Emergency manual override'
                ]
            ],
            [
                'id' => 'security-grilles',
                'title' => 'Security Grilles',
                'description' => 'Robust security grilles that provide protection without compromising visibility.',
                'details' => 'Our security grilles offer an excellent balance between security and aesthetics. Ideal for shopfronts, windows, and entrances, they allow for natural ventilation while preventing unauthorized access.',
                'features' => [
                    'Heavy-duty steel construction',
                    'Collapsible and fixed options',
                    'Powder-coated finish',
                    'Multiple locking points',
                    'Custom designs and patterns',
                    'Certified by local authorities'
                ]
            ],
            [
                'id' => 'automatic-gates',
                'title' => 'Automatic Gates',
                'description' => 'State-of-the-art automatic gate systems for enhanced security and convenience.',
                'details' => 'We supply and install automatic sliding gates, swing gates, and barrier systems with advanced access control features. Perfect for condominiums, factories, commercial buildings, and private estates.',
                'features' => [
                    'Sliding and swing gate options',
                    'Remote control operation',
                    'Card reader and biometric access',
                    'Intercom integration',
                    'Safety sensors and auto-reverse',
                    'Battery backup system'
                ]
            ],
            [
                'id' => 'automatic-doors',
                'title' => 'Automatic Doors',
                'description' => 'Modern automatic door solutions for commercial and public spaces.',
                'details' => 'Our automatic doors provide seamless access for high-traffic areas. We install sliding doors, swing doors, and revolving doors with motion sensors and safety features compliant with Singapore building codes.',
                'features' => [
                    'Sliding, swing, and revolving types',
                    'Motion sensor activation',
                    'Touchless operation',
                    'Fire-rated options available',
                    'Energy-efficient designs',
                    'ADA compliant accessibility'
                ]
            ],
            [
                'id' => 'metal-fabrication',
                'title' => 'Metal Works & Fabrication',
                'description' => 'Custom metal fabrication services for diverse industrial needs.',
                'details' => 'From structural steel works to decorative metal elements, we provide comprehensive fabrication services. Our experienced team can handle projects of any scale with precision and quality craftsmanship.',
                'features' => [
                    'Custom metal fabrication',
                    'Structural steel installation',
                    'Stainless steel works',
                    'Metal cladding and roofing',
                    'Industrial platforms and walkways',
                    'On-site welding services'
                ]
            ],
            [
                'id' => 'maintenance',
                'title' => 'Maintenance & Repair Services',
                'description' => 'Comprehensive maintenance programs to keep your installations in peak condition.',
                'details' => 'Regular maintenance is essential for the longevity and performance of your roller shutters, gates, and doors. We offer scheduled maintenance contracts and emergency repair services.',
                'features' => [
                    'Preventive maintenance programs',
                    'Emergency repair services',
                    '24/7 service hotline',
                    'Motor and parts replacement',
                    'Lubrication and adjustment',
                    'Safety inspection and testing'
                ]
            ],
        ];

        return view('services', compact('services'));
    }

    /**
     * Display the gallery page.
     *
     * @return \Illuminate\View\View
     */
    public function gallery()
    {
        // Gallery images organized by category
        $projects = [
            [
                'title' => 'Warehouse Roller Shutters',
                'category' => 'Commercial',
                'image' => 'gallery/commercial-1.jpg',
                'description' => 'Heavy-duty roller shutters for logistics warehouse'
            ],
            [
                'title' => 'Retail Shop Security Grilles',
                'category' => 'Commercial',
                'image' => 'gallery/commercial-2.jpg',
                'description' => 'Collapsible security grilles for retail shopfront'
            ],
            [
                'title' => 'Shopping Mall Automatic Doors',
                'category' => 'Commercial',
                'image' => 'gallery/commercial-3.jpg',
                'description' => 'Automatic sliding doors at main entrance'
            ],
            [
                'title' => 'Factory Roller Shutters',
                'category' => 'Industrial',
                'image' => 'gallery/industrial-1.jpg',
                'description' => 'Industrial-grade roller shutters for manufacturing facility'
            ],
            [
                'title' => 'Industrial Gate System',
                'category' => 'Industrial',
                'image' => 'gallery/industrial-2.jpg',
                'description' => 'Heavy-duty sliding gate for industrial complex'
            ],
            [
                'title' => 'Workshop Security',
                'category' => 'Industrial',
                'image' => 'gallery/industrial-3.jpg',
                'description' => 'Security shutters for workshop premises'
            ],
            [
                'title' => 'Condominium Auto Gate',
                'category' => 'Residential',
                'image' => 'gallery/residential-1.jpg',
                'description' => 'Automatic sliding gate with card access'
            ],
            [
                'title' => 'Landed Property Gate',
                'category' => 'Residential',
                'image' => 'gallery/residential-2.jpg',
                'description' => 'Decorative swing gate with auto opener'
            ],
            [
                'title' => 'Residential Roller Shutters',
                'category' => 'Residential',
                'image' => 'gallery/residential-3.jpg',
                'description' => 'Motorized roller shutters for home garage'
            ],
        ];

        $categories = ['All', 'Commercial', 'Industrial', 'Residential'];

        return view('gallery', compact('projects', 'categories'));
    }

    /**
     * Display the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Handle contact form submission.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function submitContact(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Save to database
        $contact = Contact::create($validated);

        // Send email notification
        try {
            Mail::to(config('mail.from.address'))->send(new ContactReceived($contact));
        } catch (\Exception $e) {
            // Log the error but don't fail the request
            \Log::error('Failed to send contact email: ' . $e->getMessage());
        }

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you for contacting us! We will get back to you soon.'
            ]);
        }

        // Redirect with success message for regular form submissions
        return redirect()->route('contact')
            ->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
