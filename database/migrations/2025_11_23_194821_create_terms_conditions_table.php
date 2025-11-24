<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('terms_conditions', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->timestamps();
        });

        // Insert default terms and conditions
        DB::table('terms_conditions')->insert([
            'content' => '<h2>Terms and Conditions</h2>
<p>Welcome to Roller Shutter & Construction Pte. Ltd. By accessing and using our website and services, you agree to comply with and be bound by the following terms and conditions.</p>

<h3>1. Services</h3>
<p>We provide professional roller shutter installation, repair, maintenance, and construction services in Singapore. All services are subject to availability and our standard terms of engagement.</p>

<h3>2. Quotations and Pricing</h3>
<p>All quotations are valid for 30 days from the date of issue. Prices are subject to change without prior notice. Final pricing will be confirmed upon acceptance of quotation.</p>

<h3>3. Payment Terms</h3>
<ul>
<li>A deposit may be required before commencement of work</li>
<li>Full payment is due upon completion of work unless otherwise agreed</li>
<li>We accept cash, bank transfer, and approved payment methods</li>
</ul>

<h3>4. Warranty</h3>
<p>We provide warranty coverage on workmanship and materials as specified in individual project agreements. Warranty terms vary by service type and will be clearly stated in your contract.</p>

<h3>5. Liability</h3>
<p>While we take every precaution to ensure quality work, we are not liable for damages arising from improper use, unauthorized modifications, or normal wear and tear after completion.</p>

<h3>6. Cancellation Policy</h3>
<p>Cancellations must be made in writing. Deposits may be non-refundable if work has already commenced or materials have been ordered.</p>

<h3>7. Contact Information</h3>
<p>For any questions regarding these terms, please contact us at rollershutter14@gmail.com or call +65 8544 5560.</p>

<p><em>Last Updated: November 2025</em></p>',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terms_conditions');
    }
};
