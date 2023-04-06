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
        Schema::create('profesori', function (Blueprint $table) {
            $table->id();
            $table->string("ime")->required();
            $table->string("prezime")->required();
            $table->string("email")->required();
            $table->string("password")->required();
            $table->boolean("is_razredni")->default(false);
            $table->foreignId("id_predmet")->constrained("predmeti")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesori');
    }
};
