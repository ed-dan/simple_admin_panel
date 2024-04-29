<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(Employee::class, "employee_id", "id");
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'deal_products',
            'product_id', 'deal_id');
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class, 'stage_id', 'id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'note_id', 'deal_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'deal_id', 'task_id');
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id', 'id');
    }
}
