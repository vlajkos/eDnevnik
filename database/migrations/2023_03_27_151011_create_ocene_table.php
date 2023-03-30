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
        Schema::create('ocene', function (Blueprint $table) {
            $table->id();
            $table->integer("vrednost");
            $table->dateTime("datum_vreme");
            $table->text("opis");
            $table->foreignId("id_ucenik")->constrained("ucenici")->cascadeOnDelete();
            $table->foreignId("id_profesor")->constrained("profesori")->cascadeOnDelete();
            $table->foreignId("id_predmet")->constrained("predmeti")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ocene');
    }
};
