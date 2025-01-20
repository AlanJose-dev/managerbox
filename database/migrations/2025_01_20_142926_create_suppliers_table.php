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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('cnpj', 14)->unique();
            $table->char('state_registration', 9)->unique()->nullable();
            $table->char('cpf', 11)->unique();
            $table->string('email')->unique();
            $table->char('phone_number', 13)->nullable();
            $table->boolean('is_active')->default(true);
            $table->index(['email', 'name', 'cnpj']);
            $table->timestamps();
        });

        Schema::table('suppliers', function (Blueprint $table) {
            $table->foreignId('company_id')->after('is_active')->constrained('companies', 'id')
            ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->after('company_id')->constrained('users', 'id')
            ->noActionOnDelete()->cascadeOnUpdate();
        });

        Schema::table('items_in_stock', function (Blueprint $table) {
            $table->foreignId('supplier_id')->nullable()->after('item_in_stock_category_id')
            ->constrained('suppliers', 'id')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items_in_stock', function (Blueprint $table) {
            $table->dropConstrainedForeignId('supplier_id');
        });
        Schema::dropIfExists('suppliers');
    }
};
