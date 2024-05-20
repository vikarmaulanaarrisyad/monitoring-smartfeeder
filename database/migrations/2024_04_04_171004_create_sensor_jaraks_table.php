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
        Schema::create('sensor_jaraks', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('jarak');
            $table->integer('presentase_pakan')->default(0);
            $table->integer('status_pakan')->default(0);
            $table->integer('status_alarm')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_jaraks');
    }
};
