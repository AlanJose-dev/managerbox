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
            $table->enum('movement_type', collect(\App\Enums\Models\StockMovementTypeEnum::cases())
            ->pluck('value')->toArray());
            $table->decimal('quantity', 10, 2);
            $table->text('observations')->nullable();
            $table->index(['movement_type']);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('stock_movements', function (Blueprint $table) {
            $table->foreignId('item_in_stock_id')->after('observations')
            ->constrained('items_in_stock', 'id')->noActionOnDelete()->cascadeOnUpdate();
            $table->foreignId('company_id')->after('item_in_stock_id')->constrained('companies', 'id')
            ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->after('company_id')->constrained('users', 'id')
            ->noActionOnDelete()->cascadeOnUpdate();
            $table->foreignId('supplier_id')->after('user_id')->constrained('suppliers', 'id')
            ->noActionOnDelete()->cascadeOnUpdate();
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
