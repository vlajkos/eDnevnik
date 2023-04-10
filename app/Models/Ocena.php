<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocena extends Model
{
    protected $casts = [
        'vrednost' => 'integer' // 1 / 0 -> true / false
    ];
    public $table = 'ocene';
    public function ucenik()
    {
        return $this->belongsTo(Ucenik::class, "id_ucenik");
    }
    public function predmet()
    {
        return $this->belongsTo(Predmet::class, "id_predmet");
    }
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, "id_profesor");
    }
}
