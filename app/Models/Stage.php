<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    public function deals()
    {
        return $this->hasMany(Deal::class, 'stage_id', 'id');
    }
}
