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
        Schema::create('odeljenje_profesor', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("id_odeljenje")->constrained("odeljenja")->cascadeOnDelete();
            $table->foreignId("id_profesor")->constrained("profesori")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('odeljenje_profesor');
    }
};
