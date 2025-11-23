<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;
use App\Models\Testimonial;
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
        // Fetch active services from database
        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->take(6)
            ->get()
            ->map(function($service) {
                return [
                    'title' => $service->title,
                    'description' => $service->description,
                    'icon' => $service->icon ?? 'default'
                ];
            })
            ->toArray();
        
        // If no services in database, use fallback
        if (empty($services)) {
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
        }

        // Fetch featured projects from database
        $projects = Project::where('is_featured', true)
            ->orderBy('order')
            ->take(3)
            ->get()
            ->map(function($project) {
                return [
                    'id' => $project->id,
                    'title' => $project->title,
                    'category' => $project->location ?? 'Project',
                    'image' => $project->image,
                    'description' => $project->description
                ];
            })
            ->toArray();
        
        // Fallback if no projects
        if (empty($projects)) {
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
        }

        // Fetch testimonials from database
        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('order')
            ->take(3)
            ->get()
            ->map(function($testimonial) {
                return [
                    'name' => $testimonial->name,
                    'company' => $testimonial->company ?? 'Valued Client',
                    'message' => $testimonial->content,
                    'rating' => $testimonial->rating,
                    'avatar' => $testimonial->avatar
                ];
            })
            ->toArray();
        
        // Fallback testimonials
        if (empty($testimonials)) {
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
        }

        return view('home', compact('services', 'projects', 'testimonials'));
    }
}
