<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Razredni extends Model
{
    public $table = 'razredni';
    public function odeljenje()
    {
        return $this->hasOne(Odeljenje::class, "id_razredni");
    }
}
