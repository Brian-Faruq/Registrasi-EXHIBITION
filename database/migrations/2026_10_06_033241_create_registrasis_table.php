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
        Schema::create('registrasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wali_id')->constrained('wali_santri')->onDelete('cascade');
            $table->foreignId('bed_id')->nullable()->constrained('beds')->onDelete('set null');
            $table->enum('opsi_menginap', ['ya', 'tidak']);
            $table->timestamp('tgl_registrasi');
            $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasis');
    }
};
