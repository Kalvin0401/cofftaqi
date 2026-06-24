<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('stok_masuks', function (Blueprint $table) {
            $table->string('sumber_type')->after('supplier_id');
            $table->string('sumber_nama')->nullable()->after('sumber_type');
        });
    }

    public function down(): void
    {
        Schema::table('stok_masuks', function (Blueprint $table) {
            $table->dropColumn(['sumber_type', 'sumber_nama']);
        });
    }
};

