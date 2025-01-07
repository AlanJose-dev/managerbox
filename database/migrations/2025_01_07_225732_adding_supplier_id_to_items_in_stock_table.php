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
        Schema::table('items_in_stock', function (Blueprint $table) {
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers', 'id')
                ->nullOnDelete()->cascadeOnUpdate();
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
    }
};
