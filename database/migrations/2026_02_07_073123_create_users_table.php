<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

        $table->id(); 

        $table->string('name')->nullable();
        $table->string('phone')->nullable();
        $table->string('mobile')->nullable();
        $table->string('address')->nullable();
        $table->string('gender')->nullable();
        $table->string('job')->nullable();

        $table->boolean('for_program')->nullable();
        $table->string('password');

        $table->date('dob')->nullable();
        $table->date('user_date')->nullable();
        $table->dateTime('user_time')->nullable();

        $table->foreignId('created_by')
            ->nullable()
            ->constrained('users')
            ->nullOnDelete();

        $table->timestamps();
    });

    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
