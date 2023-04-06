<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odeljenje_predmet extends Model
{
    public $table = 'odeljenje_predmet';
    public function odeljenje()
    {
        return $this->belongsTo(Odeljenje::class, 'id_odeljenje');
    }
    public function predmet()
    {
        return $this->belongsTo(Predmet::class, 'id_predmet');
    }
}
