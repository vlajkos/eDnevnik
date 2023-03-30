<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odeljenje_predmet extends Model
{
    public function odeljenje()
    {
        return $this->belongsTo(Odeljenje::class);
    }
    public function predmet()
    {
        return $this->belongsTo(Predmet::class);
    }
}
