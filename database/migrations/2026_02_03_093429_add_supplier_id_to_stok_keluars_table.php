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
        Schema::table('stok_keluars', function (Blueprint $table) {
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers')->after('user_id')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('stok_keluars', function (Blueprint $table) {
            $table->dropConstrainedForeignId('supplier_id');
        });
    }
};
