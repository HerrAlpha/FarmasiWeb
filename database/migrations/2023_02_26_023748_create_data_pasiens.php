<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pasiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_id_user')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('nik');
            $table->string('slug');
            $table->date('tgl_lahir');
            $table->text('address');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('bb');
            $table->string('tb');
            $table->string('t_pendidikan');
            $table->string('pekerjaan');
            $table->string('hipertensi');
            $table->string('diabetes_melitus');
            $table->string('critical_kidney_disease');
            $table->string('stroke');
            $table->text('r_sakit');
            $table->string('cigarettes');
            $table->string('olahraga');
            $table->boolean('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_pasiens');
    }
};
