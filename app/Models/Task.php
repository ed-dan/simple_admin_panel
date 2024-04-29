<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(Employee::class, "employee_id", "task_id");
    }

    public function deal()
    {
        return $this->belongsTo(Deal::class, 'deal_id', 'task_id');
    }
}
