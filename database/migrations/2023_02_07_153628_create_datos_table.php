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
        Schema::create('datos', function (Blueprint $table) {
           // $table->id();
            $table->unsignedBigInteger('cedula')->primary()->unique();
            $table->string('nombres');
            $table->string('cargo');
            $table->string('lugar_nacimiento');
            $table->date('fecha_nacimiento');
            $table->date('fecha_expedicion');
            $table->string('altura');
            $table->string('sexo');
            $table->string('Grupo_Sanguineo');
            $table->enum('status',[1,2,3])->default(1);
            
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('datos');
    }
};
