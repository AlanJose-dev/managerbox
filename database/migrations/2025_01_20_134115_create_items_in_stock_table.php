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
        Schema::create('items_in_stock', function (Blueprint $table) {
            $table->id();
            $table->string('sku_code', 20)->unique()->nullable();
            $table->string('barcode', 50)->unique()->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('unity_type', collect(\App\Enums\Models\ItemInStockUnityTypeEnum::cases())->pluck('value')
            ->toArray())->default(\App\Enums\Models\ItemInStockUnityTypeEnum::UN);
            $table->decimal('current_quantity', 10, 2)->default(0);
            $table->decimal('minimum_quantity', 10, 2)->default(1);
            $table->decimal('cost_price', 10, 2)->nullable();
            $table->decimal('sell_price', 10, 2)->nullable();
            $table->string('picture')->nullable();
            $table->text('location')->nullable();
            $table->boolean('is_active')->default(true);
            $table->index(['sku_code', 'barcode', 'name']);
            $table->timestamps();
        });

        Schema::table('items_in_stock', function (Blueprint $table) {
            $table->foreignId('company_id')->after('is_active')->constrained('companies', 'id')
            ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->after('company_id')->constrained('users', 'id')
            ->noActionOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items_in_stock', function (Blueprint $table) {
            $table->dropConstrainedForeignId('company_id');
            $table->dropConstrainedForeignId('user_id');
        });
        Schema::dropIfExists('items_in_stock');
    }
};
