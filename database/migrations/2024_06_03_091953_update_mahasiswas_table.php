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
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->dropColumn('ipk');
            $table->enum('jenis_kelamin', ['L', 'P'])->after('email');
            $table->string('alamat')->after('jenis_kelamin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->float('ipk')->after('email');
            $table->dropColumn('jenis_kelamin');
            $table->dropColumn('alamat');
        });
    }
};
