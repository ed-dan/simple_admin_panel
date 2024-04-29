<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Lead extends Model
{
    use HasFactory;
    use Sortable;
    public array $sortable = ['source',];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('source', 'like', '%' . request('search') . '%');
        }
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_leads',
            'lead_id', 'employee_id');
    }

    public function deals()
    {
        return $this->hasMany(Deal::class, 'lead_id', 'id');
    }


}
