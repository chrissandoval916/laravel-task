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
        Schema::create('entries', function (Blueprint $table) {
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_unicode_ci');
            $table->id();
            $table->string('first_name')->default('');
            $table->string('last_name')->default('');
            $table->string('address')->default('');
            $table->string('city')->default('');
            $table->string('country')->default('');
            $table->date('birthdate')->nullable();
            $table->boolean('is_married')->default(false);
            $table->date('marriage_date')->nullable();
            $table->string('marriage_country')->default('');
            $table->boolean('is_widowed')->default(false);
            $table->boolean('is_separated')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
