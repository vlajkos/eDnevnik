<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Odeljenje extends Model
{
    public $table = 'odeljenja';

    public function razredni()
    {
        return $this->belongsTo(Profesor::class, "id_razredni")->where("is_razredni", "=", "1");
    }
    public function ucenici()
    {
        return $this->hasMany(Ucenik::class, "id_odeljenje");
    }
    public function profesori()
    {
        return $this->belongsToMany(Profesor::class, "odeljenje_profesor", "id_odeljenje", "id_profesor");
    }
    public function predmeti()
    {
        return $this->belongsToMany(Predmet::class, "odeljenje_predmet", 'id_odeljenje', 'id_predmet');
    }
}
