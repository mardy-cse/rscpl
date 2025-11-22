<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Featured services for home page
        $services = [
            [
                'title' => 'Roller Shutters',
                'description' => 'High-quality roller shutters for commercial and residential properties. Durable, secure, and customizable.',
                'icon' => 'shutters'
            ],
            [
                'title' => 'Security Grilles',
                'description' => 'Robust security grilles to protect your premises while maintaining visibility and airflow.',
                'icon' => 'grilles'
            ],
            [
                'title' => 'Automatic Gates',
                'description' => 'Automated gate systems with advanced access control for enhanced security and convenience.',
                'icon' => 'gates'
            ],
            [
                'title' => 'Automatic Doors',
                'description' => 'Modern automatic door solutions for commercial buildings, hospitals, and retail spaces.',
                'icon' => 'doors'
            ],
            [
                'title' => 'Metal Works',
                'description' => 'Custom metal fabrication and installation services for industrial and commercial projects.',
                'icon' => 'metal'
            ],
            [
                'title' => 'Maintenance Services',
                'description' => 'Comprehensive maintenance and repair services to keep your installations in optimal condition.',
                'icon' => 'maintenance'
            ],
        ];

        // Latest projects for home page
        $projects = [
            [
                'title' => 'Commercial Warehouse Security',
                'category' => 'Commercial',
                'image' => 'project1.jpg',
                'description' => 'Complete roller shutter installation for a 10,000 sqft warehouse facility.'
            ],
            [
                'title' => 'Residential Auto Gate System',
                'category' => 'Residential',
                'image' => 'project2.jpg',
                'description' => 'Automated sliding gate with remote access control for luxury condominium.'
            ],
            [
                'title' => 'Industrial Facility Upgrade',
                'category' => 'Industrial',
                'image' => 'project3.jpg',
                'description' => 'Heavy-duty roller shutters and security grilles for manufacturing plant.'
            ],
        ];

        // Testimonials for home page
        $testimonials = [
            [
                'name' => 'David Tan',
                'company' => 'Warehouse Solutions Pte Ltd',
                'message' => 'Excellent workmanship and professional service. Our roller shutters have been functioning perfectly for over 3 years now.',
                'rating' => 5
            ],
            [
                'name' => 'Sarah Lim',
                'company' => 'Residential Client',
                'message' => 'Very satisfied with the automatic gate installation. The team was punctual, efficient, and cleaned up after the job.',
                'rating' => 5
            ],
            [
                'name' => 'Michael Chen',
                'company' => 'Industrial Park Management',
                'message' => 'Reliable partner for all our security shutter needs. Quick response time and competitive pricing.',
                'rating' => 5
            ],
        ];

        return view('home', compact('services', 'projects', 'testimonials'));
    }
}
