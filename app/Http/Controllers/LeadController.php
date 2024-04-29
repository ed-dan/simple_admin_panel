<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Lead;
use App\Models\Position;
use Database\Factories\LeadFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    public static function index()
    {

        return view('leads.index', ['name' => 'leads', 'title' => 'leads',
            'leads' => Lead::sortable()->latest()->orderBy('source')->filter(request(['search']))
                ->paginate(10),

        ]);
    }

    public function message()
    {

        return inertia("Message/Index");
    }

    public static function create()
    {
        return view("leads.create");
    }

    public static function store()
    {
        Lead::factory(1)->create();
    }
}
