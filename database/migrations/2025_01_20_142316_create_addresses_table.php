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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street');
            $table->char('number', 5);
            $table->text('complement')->nullable();
            $table->string('neighborhood', 150);
            $table->string('city');
            $table->char('state', 2);
            $table->char('zipcode', 8);
            $table->char('country', 2);
            $table->morphs('addressable');
            $table->index(['zipcode', 'state', 'city']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
