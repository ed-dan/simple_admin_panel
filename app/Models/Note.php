<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    public function deal()
    {
        return $this->belongsTo(Deal::class, 'note_id', 'deal_id');
    }
}
