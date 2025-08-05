<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 // database/migrations/xxxx_xx_xx_create_addon_benefits_table.php
public function up(): void
{
    Schema::create('addon_benefits', function (Blueprint $table) {
        $table->id();
        $table->string('icon_class');   // e.g. fas fa-mobile-alt
        $table->string('title');
        $table->string('subtitle')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addon_benefits');
    }
};
