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
        Schema::table('users', function (Blueprint $table) {
            $table->char('cpf', 11)->unique()->nullable();
            $table->char('phone_number', 11)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_activity')->nullable();
            $table->string('profile_picture', 150)->nullable();
            $table->foreignId('company_id')->constrained('companies', 'id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->index(['email', 'cpf']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('cpf');
            $table->dropColumn('phone_number');
            $table->dropColumn('is_active');
            $table->dropColumn('last_activity');
            $table->dropColumn('profile_picture');
            $table->dropColumn('company_id');
            $table->dropConstrainedForeignId('company_id');
            $table->dropIndex('email');
            $table->dropIndex('cpf');
        });
    }
};
