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
        Schema::create('time_sheets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('date')->nullable();
            $table->string('day')->nullable();
            $table->string('first_thirtymin')->nullable();
            $table->string('second_thirtymin')->nullable();
            $table->string('third_thirtymin')->nullable();
            $table->string('fourth_thirtymin')->nullable();
            $table->string('fifth_thirtymin')->nullable();
            $table->string('sixth_thirtymin')->nullable();
            $table->string('seventh_thirtymin')->nullable();
            $table->string('eighth_thirtymin')->nullable();
            $table->string('nineth_thirtymin')->nullable();
            $table->string('tenth_thirtymin')->nullable();
            $table->string('eleventh_thirtymin')->nullable();
            $table->string('twelveth_thirtymin')->nullable();
            $table->string('thirteenth_thirtymin')->nullable();
            $table->string('fourteenth_thirtymin')->nullable();
            $table->string('fifteenth_thirtymin')->nullable();
            $table->string('sixteenth_thirtymin')->nullable();
            $table->string('seventieth_thirtymin')->nullable();
            $table->string('eighteenth_thirtymin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_sheets');
    }
};
