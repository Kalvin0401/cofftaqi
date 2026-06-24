<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('stok_keluars', function (Blueprint $table) {
            $table->decimal('harga_perkilo', 15, 2)->default(0)->after('jumlah');
            $table->decimal('total', 15, 2)->default(0)->after('harga_perkilo');
        });
    }

    public function down()
    {
        Schema::table('stok_keluars', function (Blueprint $table) {
            $table->dropColumn(['harga_perkilo', 'total']);
        });
    }
};
