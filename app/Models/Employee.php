<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Kyslik\ColumnSortable\Sortable;

class Employee extends Model
{
    use SoftDeletes, CascadeSoftDeletes;
    use HasFactory, Sortable;

    protected array $sortable = ['name', 'position_id', 'date_of_employment', 'email', 'salary'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $positions = DB::table('positions')
                ->where('title', 'like', '%' . request('search') . '%')
                ->get();
            $query
                ->orWhere('email', 'like', '%' . request('search') . '%')
                ->orWhere('name', 'like', '%' . request('search') . '%');
            foreach ($positions as $position) {

                $query->where('position_id', '=', $position->id);
            }
        }
    }

}
