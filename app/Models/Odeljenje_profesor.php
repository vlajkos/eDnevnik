<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odeljenje_profesor extends Model
{
    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }
    public function odeljenje()
    {
        return $this->belongsTo(Odeljenje::class);
    }
}
