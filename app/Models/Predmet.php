<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predmet extends Model
{
    public $table = 'predmeti';
    use HasFactory;

    public function odeljenja()
    {
        return $this->belongsToMany(Odeljenje::class, "odeljenje_predmet", "id_predmet");
    }
    public function ocene()
    {
        return $this->hasMany(Ocena::class, "id_predmet");
    }
    public function profesori()
    {
        return $this->hasMany(Profesor::class, "id_predmet");
    }
}
