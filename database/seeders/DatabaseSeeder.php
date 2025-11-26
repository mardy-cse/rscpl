<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\AboutContent;
use App\Models\Policy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@htr.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Create Services
        $services = [
            [
                'title' => 'Roller Shutters',
                'icon' => 'fas fa-warehouse',
                'description' => 'High-quality roller shutters for commercial and residential properties.',
                'details' => 'Our roller shutters provide excellent security, insulation, and noise reduction. Available in various materials including aluminum and steel, custom-designed to fit your specific requirements.',
                'features' => json_encode([
                    'Automated and Manual Options',
                    'Weather Resistant',
                    'Custom Sizes Available',
                    'Multiple Color Choices',
                    'Professional Installation'
                ]),
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Security Grilles',
                'icon' => 'fas fa-shield-alt',
                'description' => 'Durable security grilles to protect your property.',
                'details' => 'Premium quality security grilles designed to provide maximum protection while maintaining aesthetic appeal. Perfect for shops, homes, and commercial buildings.',
                'features' => json_encode([
                    'Heavy-Duty Construction',
                    'Powder Coated Finish',
                    'Retractable Options',
                    'Fire Rated Available',
                    'Easy Maintenance'
                ]),
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Automatic Gates',
                'icon' => 'fas fa-door-open',
                'description' => 'Smart automatic gates with remote control access.',
                'details' => 'Modern automatic gate systems with advanced security features. Equipped with remote controls, sensors, and safety mechanisms for convenient and secure access control.',
                'features' => json_encode([
                    'Remote Control Operation',
                    'Motion Sensors',
                    'Battery Backup',
                    'Safety Features',
                    'Weatherproof Design'
                ]),
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Automatic Doors',
                'icon' => 'fas fa-door-closed',
                'description' => 'Automatic sliding and swing doors for modern buildings.',
                'details' => 'State-of-the-art automatic door systems perfect for commercial buildings, hospitals, and retail spaces. Energy-efficient with smooth operation.',
                'features' => json_encode([
                    'Touchless Operation',
                    'Energy Efficient',
                    'Customizable Designs',
                    'Safety Sensors',
                    'Low Maintenance'
                ]),
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Metal Fabrication',
                'icon' => 'fas fa-tools',
                'description' => 'Custom metal fabrication services for all your needs.',
                'details' => 'Expert metal fabrication services including custom metalwork, welding, and installation. We handle projects of all sizes with precision and quality.',
                'features' => json_encode([
                    'Custom Design',
                    'Expert Welding',
                    'Quality Materials',
                    'On-site Installation',
                    'Competitive Pricing'
                ]),
                'order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Create Projects
        $projects = [
            [
                'title' => 'Commercial Plaza Roller Shutters',
                'description' => 'Installation of automated roller shutters for a 5-storey commercial building with 20+ retail units.',
                'location' => 'Orchard Road, Singapore',
                'status' => 'Completed',
                'year' => 2024,
                'is_featured' => true,
            ],
            [
                'title' => 'Industrial Warehouse Security System',
                'description' => 'Complete security grilles and roller shutters installation for a 10,000 sqft warehouse facility.',
                'location' => 'Jurong East, Singapore',
                'status' => 'Completed',
                'year' => 2024,
                'is_featured' => true,
            ],
            [
                'title' => 'Residential Automatic Gate',
                'description' => 'Smart automatic gate system with remote access and security features for luxury condominium.',
                'location' => 'Bukit Timah, Singapore',
                'status' => 'Completed',
                'year' => 2023,
                'is_featured' => false,
            ],
            [
                'title' => 'Shopping Mall Automatic Doors',
                'description' => 'Installation of 15 automatic sliding doors with touchless sensors throughout the shopping complex.',
                'location' => 'Marina Bay, Singapore',
                'status' => 'Completed',
                'year' => 2023,
                'is_featured' => true,
            ],
            [
                'title' => 'Factory Security Grilles',
                'description' => 'Heavy-duty security grilles for manufacturing facility covering 50+ windows and entry points.',
                'location' => 'Woodlands, Singapore',
                'status' => 'Completed',
                'year' => 2024,
                'is_featured' => false,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        // Create Testimonials
        $testimonials = [
            [
                'name' => 'David Tan',
                'company' => 'ABC Trading Pte Ltd',
                'rating' => 5,
                'content' => 'Excellent service from start to finish! The roller shutters installed at our warehouse are of top quality and the team was very professional. Managing Director at ABC Trading Pte Ltd.',
                'is_active' => true,
            ],
            [
                'name' => 'Sarah Wong',
                'company' => 'XYZ Retail Group',
                'rating' => 5,
                'content' => 'Very impressed with the automatic gates installed at our office. The installation was quick and the after-sales service is outstanding. Operations Manager at XYZ Retail Group.',
                'is_active' => true,
            ],
            [
                'name' => 'Michael Lee',
                'company' => 'Lee Manufacturing',
                'rating' => 5,
                'content' => 'HTR Engineering delivered beyond our expectations. The security grilles are robust and exactly what we needed for our factory. CEO at Lee Manufacturing.',
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }

        // Create About Content
        $aboutContents = [
            [
                'section_key' => 'who_we_are',
                'title' => 'Who We Are',
                'content' => 'HTR ENGINEERING PTE LTD is a leading provider of roller shutters, security grilles, automatic gates, and metal fabrication services in Singapore. With over 15 years of experience, we have established ourselves as a trusted name in the industry, delivering quality solutions to residential, commercial, and industrial clients.',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'section_key' => 'our_mission',
                'title' => 'Our Mission',
                'content' => 'Our mission is to provide innovative, high-quality security and automation solutions that exceed our clients\' expectations. We are committed to excellence in every project, ensuring customer satisfaction through professional service, quality workmanship, and reliable after-sales support.',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'section_key' => 'why_choose_us',
                'title' => 'Why Choose Us',
                'content' => 'Choose HTR Engineering for our extensive experience, professional team, quality materials, competitive pricing, and dedicated customer service. We pride ourselves on completing projects on time and within budget while maintaining the highest standards of workmanship.',
                'is_active' => true,
                'order' => 3,
            ],
        ];

        foreach ($aboutContents as $content) {
            AboutContent::create($content);
        }
    }
}
