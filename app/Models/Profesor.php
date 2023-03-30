<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    public $table = 'profesori';
    public function odeljenja()
    {
        return $this->belongsToMany(Odeljenje::class, "odeljenje_profesor");
    }
    public function ocene()
    {
        return $this->hasMany(Ocena::class, "id_prefosr");
    }
}
