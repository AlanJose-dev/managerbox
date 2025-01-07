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
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->enum('movement_type', collect(\App\Enums\Enums\Models\StockMovementTypeEnum::cases())
            ->pluck('value')->toArray());
            $table->float('quantity');
            $table->text('observations')->nullable();
            $table->foreignId('item_id')->constrained('items_in_stock', 'id')
            ->noActionOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users', 'id')
            ->noActionOnDelete()->cascadeOnUpdate();
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers', 'id')
            ->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
