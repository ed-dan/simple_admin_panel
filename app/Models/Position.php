<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;

class Position extends Model
{
    use SoftDeletes, CascadeSoftDeletes;
    use HasFactory, Sortable;

    protected $cascadeDeletes = ['employees'];

    protected $dates = ['deleted_at'];

    public array $sortable = ['title', 'updated_at'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
                $query->where('title', 'like', '%' . request('search') . '%' );
            }
        }

}
