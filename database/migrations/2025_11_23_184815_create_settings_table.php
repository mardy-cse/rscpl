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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });
        
        // Insert default values
        DB::table('settings')->insert([
            ['key' => 'phone', 'value' => '+65 8544 5560', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'email', 'value' => 'rollershutter14@gmail.com', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'business_hours', 'value' => 'Mon-Fri: 9AM-6PM | Sat: 9AM-1PM', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'address', 'value' => 'Singapore', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'whatsapp', 'value' => '6585445560', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
