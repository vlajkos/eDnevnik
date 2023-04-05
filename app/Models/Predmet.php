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
        return $this->belongsToMany(Odeljenje::class, "odeljenje_profesor");
    }
    public function ocene()
    {
        return $this->hasMany(Ocena::class, "id_predmet ");
    }
}
