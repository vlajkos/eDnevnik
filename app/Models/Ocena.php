<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocena extends Model
{
    public function ucenik()
    {
        return $this->belongsTo(Ucenik::class, "id_profesor");
    }
    public function predmet()
    {
        return $this->belongsTo(Predmet::class, "id_profesor");
    }
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, "id_profesor");
    }
}
