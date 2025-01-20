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
        Schema::create('item_in_stock_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('item_in_stock_categories', function (Blueprint $table) {
            $table->foreignId('company_id')->after('is_active')->constrained('companies', 'id')
            ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->after('company_id')->constrained('users', 'id')
            ->noActionOnDelete()->cascadeOnUpdate();
        });

        Schema::table('items_in_stock', function (Blueprint $table) {
            $table->foreignId('item_in_stock_category_id')->nullable()->after('user_id')
            ->constrained('item_in_stock_categories', 'id')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_in_stock_categories', function (Blueprint $table) {
            $table->dropConstrainedForeignId('company_id');
            $table->dropConstrainedForeignId('user_id');
        });
        Schema::table('items_in_stock', function (Blueprint $table) {
            $table->dropConstrainedForeignId('item_in_stock_category_id');
        });
        Schema::dropIfExists('item_in_stock_categories');
    }
};
