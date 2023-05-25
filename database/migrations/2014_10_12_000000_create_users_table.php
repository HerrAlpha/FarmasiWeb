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
            $table->string('username');
            $table->string('name');
            $table->string('email')->unique()->default('-');
            $table->string('phone_number');
            $table->text('address');
            $table->string('password')->default(Hash::make(123));
            $table->string('otp')->nullable();
            $table->string('role')->default('Pasien');
            $table->boolean('status')->default('1');
            $table->rememberToken();
            $table->boolean('active_status')->default(0);
            $table->string('avatar')->default('guest.jpg');
            $table->string('messenger_color')->default('#2180f3');
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
