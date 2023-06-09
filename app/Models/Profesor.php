<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Profesor extends Authenticatable
{
    public $table = 'profesori';
    protected $hidden = ['password'];
    protected $casts = [
        'is_razredni' => 'boolean' // 1 / 0 -> true / false
    ];
    public function odeljenja()
    {
        return $this->belongsToMany(Odeljenje::class, "odeljenje_profesor", "id_profesor", "id_odeljenje");
    }
    public function odeljenje()
    {
        return $this->hasOne(Odeljenje::class, "id_razredni");
    }
    public function ocene()
    {
        return $this->hasMany(Ocena::class, "id_profesor");
    }
    public function predmet()
    {
        return $this->belongsTo(Predmet::class, "id_predmet");
    }
}
