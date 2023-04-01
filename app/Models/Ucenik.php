<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ucenik extends Model
{
    public $table = 'ucenici';
    use HasFactory;
    protected $casts = [
        'datum_rodjenja' => 'date',
    ];
    public function odeljenje()
    {
        return $this->belongsTo(Odeljenje::class, "id_odeljenje");
    }
    public function ocene()
    {
        return $this->hasMany(Ocena::class, "id_ucenik");
    }
}
