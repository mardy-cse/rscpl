<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->string('type')->unique(); // 'privacy_policy' or 'terms_of_service'
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->timestamps();
        });

        // Insert default content
        DB::table('policies')->insert([
            [
                'type' => 'privacy_policy',
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'content' => '<h2>Privacy Policy for HTR ENGINEERING PTE LTD</h2>
<p>Last updated: ' . date('F d, Y') . '</p>

<h3>1. Information We Collect</h3>
<p>We collect information you provide directly to us when you:</p>
<ul>
    <li>Contact us through our website</li>
    <li>Request quotes or services</li>
    <li>Subscribe to our newsletter</li>
    <li>Fill out any forms on our website</li>
</ul>

<h3>2. How We Use Your Information</h3>
<p>We use the information we collect to:</p>
<ul>
    <li>Respond to your inquiries and provide customer service</li>
    <li>Process your service requests</li>
    <li>Send you updates about our services</li>
    <li>Improve our website and services</li>
</ul>

<h3>3. Information Sharing</h3>
<p>We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except as required by law.</p>

<h3>4. Data Security</h3>
<p>We implement appropriate security measures to protect your personal information from unauthorized access, alteration, or disclosure.</p>

<h3>5. Contact Us</h3>
<p>If you have questions about this Privacy Policy, please contact us at:</p>
<p>HTR ENGINEERING PTE LTD<br>
105 Sims Avenue #05-11 Chancerlodge Complex<br>
Singapore 387429<br>
Phone: +65 8697 3181<br>
Email: rollershutter14@gmail.com</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'terms_of_service',
                'title' => 'Terms of Service',
                'slug' => 'terms-of-service',
                'content' => '<h2>Terms of Service for HTR ENGINEERING PTE LTD</h2>
<p>Last updated: ' . date('F d, Y') . '</p>

<h3>1. Acceptance of Terms</h3>
<p>By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement.</p>

<h3>2. Services</h3>
<p>HTR ENGINEERING PTE LTD provides roller shutter installation, repair, and maintenance services. We reserve the right to modify or discontinue services at any time without notice.</p>

<h3>3. User Responsibilities</h3>
<p>You agree to:</p>
<ul>
    <li>Provide accurate and complete information</li>
    <li>Maintain the confidentiality of your account information</li>
    <li>Use our services only for lawful purposes</li>
    <li>Not interfere with the proper functioning of our website</li>
</ul>

<h3>4. Intellectual Property</h3>
<p>All content on this website, including text, graphics, logos, and images, is the property of HTR ENGINEERING PTE LTD and protected by copyright laws.</p>

<h3>5. Limitation of Liability</h3>
<p>HTR ENGINEERING PTE LTD shall not be liable for any indirect, incidental, special, or consequential damages arising out of or in connection with the use of our services.</p>

<h3>6. Governing Law</h3>
<p>These terms shall be governed by and construed in accordance with the laws of Singapore.</p>

<h3>7. Contact Information</h3>
<p>For questions about these Terms of Service, please contact us at:</p>
<p>HTR ENGINEERING PTE LTD<br>
105 Sims Avenue #05-11 Chancerlodge Complex<br>
Singapore 387429<br>
Phone: +65 8697 3181<br>
Email: rollershutter14@gmail.com</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policies');
    }
};
