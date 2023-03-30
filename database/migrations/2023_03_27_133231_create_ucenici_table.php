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
        Schema::create('ucenici', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("ime");
            $table->string("prezime");
            $table->string("email");
            $table->integer("jmbg");
            $table->string("broj_telefona");
            $table->date("datum_rodjenja");
            $table->foreignId("id_odeljenje")->constrained("odeljenja")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ucenici');
    }
};
