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
            $table->string('name');
            $table->char('cnpj', 14)->unique();
            $table->char('state_registration', 9)->unique();
            $table->char('phone_number', 13)->nullable();
            $table->string('contact_email')->unique()->nullable();
            $table->date('foundation_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->index(['cnpj', 'state_registration']);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->foreignId('metier_id')->after('is_active')->constrained('metiers', 'id')
            ->restrictOnDelete()->cascadeOnUpdate();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('company_id')->after('profile_picture')->constrained('companies', 'id')
            ->cascadeOnDelete()->cascadeOnUpdate();
            $table->unique(['company_id', 'is_responsible_by_company']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('company_id');
        });
        Schema::dropIfExists('companies');
    }
};
