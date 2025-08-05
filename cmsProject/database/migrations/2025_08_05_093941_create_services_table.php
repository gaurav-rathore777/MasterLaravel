<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_services_table.php

public function up(): void
{
    Schema::create('services', function (Blueprint $table) {
        $table->id();
        $table->string('icon');
        $table->string('title');
        $table->string('subtitle');
        $table->text('description');
        $table->json('key_services'); // Store as JSON array
        $table->text('why_it_matters');
        $table->string('lead_by');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
