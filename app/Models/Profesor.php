<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Profesor extends Authenticatable
{
    public $table = 'profesori';
    protected $hidden = ['lozinka'];
    protected $casts = [
        'is_razredni' => 'boolean' // 1 / 0 -> true / false
    ];
    public function odeljenja()
    {
        return $this->belongsToMany(Odeljenje::class, "odeljenje_profesor");
    }
    public function ocene()
    {
        return $this->hasMany(Ocena::class, "id_prefosr");
    }
}
