<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odeljenje_profesor extends Model
{
    public $table = 'odeljenje_profesor';
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, "id_profesor");
    }
    public function odeljenje()
    {
        return $this->belongsTo(Odeljenje::class, "id_odeljenje");
    }
}
