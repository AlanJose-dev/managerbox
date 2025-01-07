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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->char('cnpj', 14)->unique();
            $table->char('state_registration', 9)->unique();
            $table->char('phone_number', 9)->nullable();
            $table->string('email', 255)->unique();
            $table->date('foundation_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('metier_id')->constrained('metiers', 'id')
            ->noActionOnDelete()->cascadeOnUpdate();
            $table->foreignId('responsible_id')->constrained('users', 'id')
            ->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['cnpj', 'state_registration', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
