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
        Schema::create('odeljenje_predmet', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_odeljenje")->constrained("odeljenja")->cascadeOnDelete();
            $table->foreignId("id_predmet")->constrained("predmeti")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('odeljenje_predmet');
    }
};
