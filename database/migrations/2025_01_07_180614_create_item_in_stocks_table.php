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
        Schema::create('items_in_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('sku_code', 12)->unique();
            $table->string('barcode', 50)->unique();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->enum('unity_type', collect(\App\Enums\Models\ItemInStockUnityTypeEnum::cases())
            ->pluck('value')->toArray());
            $table->float('current_quantity')->default(0);
            $table->float('minimum_quantity')->default(1);
            $table->decimal('cost_price')->nullable();
            $table->decimal('sell_price')->nullable();
            $table->string('location', 255)->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('company_id')->constrained('companies', 'id')
            ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users', 'id')
            ->noActionOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_id')->nullable()->constrained('categories', 'id')
            ->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers', 'id')
            ->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['sku_code', 'barcode', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_in_stocks');
    }
};
