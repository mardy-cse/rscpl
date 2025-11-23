<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Roller Shutters',
                'description' => 'Premium quality roller shutters designed for maximum security and durability.',
                'details' => 'Our roller shutters are manufactured using high-grade materials to withstand harsh weather conditions and provide excellent security. Available in manual and motorized options, suitable for commercial warehouses, retail shops, factories, and residential properties.',
                'icon' => 'fas fa-store',
                'features' => [
                    'Heavy-duty aluminum or steel construction',
                    'Manual and motorized options available',
                    'Weather-resistant powder coating',
                    'Custom sizes and colors',
                    'Remote control operation (motorized)',
                    'Emergency manual override'
                ],
                'is_active' => true,
                'order' => 1
            ],
            [
                'title' => 'Security Grilles',
                'description' => 'Robust security grilles that provide protection without compromising visibility.',
                'details' => 'Our security grilles offer an excellent balance between security and aesthetics. Ideal for shopfronts, windows, and entrances, they allow for natural ventilation while preventing unauthorized access.',
                'icon' => 'fas fa-shield-alt',
                'features' => [
                    'Heavy-duty steel construction',
                    'Collapsible and fixed options',
                    'Powder-coated finish',
                    'Multiple locking points',
                    'Custom designs and patterns',
                    'Certified by local authorities'
                ],
                'is_active' => true,
                'order' => 2
            ],
            [
                'title' => 'Automatic Gates',
                'description' => 'State-of-the-art automatic gate systems for enhanced security and convenience.',
                'details' => 'We supply and install automatic sliding gates, swing gates, and barrier systems with advanced access control features. Perfect for condominiums, factories, commercial buildings, and private estates.',
                'icon' => 'fas fa-door-open',
                'features' => [
                    'Sliding and swing gate options',
                    'Remote control operation',
                    'Card reader and biometric access',
                    'Intercom integration',
                    'Safety sensors and auto-reverse',
                    'Battery backup system'
                ],
                'is_active' => true,
                'order' => 3
            ],
            [
                'title' => 'Automatic Doors',
                'description' => 'Modern automatic door solutions for commercial and public spaces.',
                'details' => 'Our automatic doors provide seamless access for high-traffic areas. We install sliding doors, swing doors, and revolving doors with motion sensors and safety features compliant with Singapore building codes.',
                'icon' => 'fas fa-door-closed',
                'features' => [
                    'Sliding, swing, and revolving types',
                    'Motion sensor activation',
                    'Touchless operation',
                    'Fire-rated options available',
                    'Energy-efficient designs',
                    'ADA compliant accessibility'
                ],
                'is_active' => true,
                'order' => 4
            ],
            [
                'title' => 'Metal Works & Fabrication',
                'description' => 'Custom metal fabrication services for diverse industrial needs.',
                'details' => 'From structural steel works to decorative metal elements, we provide comprehensive fabrication services. Our experienced team can handle projects of any scale with precision and quality craftsmanship.',
                'icon' => 'fas fa-tools',
                'features' => [
                    'Custom metal fabrication',
                    'Structural steel installation',
                    'Stainless steel works',
                    'Metal cladding and roofing',
                    'Industrial platforms and walkways',
                    'On-site welding services'
                ],
                'is_active' => true,
                'order' => 5
            ],
            [
                'title' => 'Maintenance & Repair Services',
                'description' => 'Comprehensive maintenance programs to keep your installations in peak condition.',
                'details' => 'Regular maintenance is essential for the longevity and performance of your roller shutters, gates, and doors. We offer scheduled maintenance contracts and emergency repair services.',
                'icon' => 'fas fa-wrench',
                'features' => [
                    'Preventive maintenance programs',
                    'Emergency repair services',
                    '24/7 service hotline',
                    'Motor and parts replacement',
                    'Lubrication and adjustment',
                    'Safety inspection and testing'
                ],
                'is_active' => true,
                'order' => 6
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
