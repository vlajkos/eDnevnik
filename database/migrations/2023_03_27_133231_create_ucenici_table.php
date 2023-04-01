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
            $table->string("ime")->required();
            $table->string("prezime")->required();
            $table->string("email")->required();
            $table->string("jmbg")->required();
            $table->string("broj_telefona")->nullable();
            $table->date("datum_rodjenja")->nullable();
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
