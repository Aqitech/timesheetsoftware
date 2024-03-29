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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('designation');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('start_time');
            $table->string('end_time');
            $table->enum('status', ['A', 'D']);
            $table->enum('is_deleted', ['N', 'Y']);
            $table->enum('theme', ['L', 'D']);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
