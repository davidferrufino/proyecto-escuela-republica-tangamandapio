<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_grado')->constrained('grados')->unsigned()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('nombre', 150);
            $table->string('numero_identidad', 13)->unique();
            $table->string('numero_cuenta', 11)->unique();
            $table->string('telefono', 8)->unique();
            $table->boolean('estado')->default(true);
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
        Schema::dropIfExists('alumnos');
    }
}
