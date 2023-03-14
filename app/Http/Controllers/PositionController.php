<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PositionController extends Controller
{
    // show all listing
    public static function index()
    {
        return view('positions.index', ['name' => 'positions', 'title' => 'positions',
            'positions' => Position::sortable()->latest()->filter(request(['search']))
                ->paginate(10),
        ]);
    }

    // show single listing
    public function show(Position $position)
    {
        return view('positions.show', [
            'position' => $position,
        ]);
    }

    // show create listing
    public function create()
    {
        return view('positions.create');
    }

    // store listing data
    public function store(StorePositionRequest $request)
    {
        $formFields = $request->validated();

        Position::create($formFields);
        return redirect('/positions')->with('message', 'Listing Created');
    }

    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'), ['positions' => Position::all()]);
    }

    public function update(Position $position)
    {
        $formFields = \request()->validate([
            'title' => ['required', 'min:2', 'max:256']
        ]);
        $position->update($formFields);
        return redirect()->route('position.show', $position->id);
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('position.index');
    }

//    public static function order()
//    {
//        $positions = Position::orderBy('title')->get();
//        return view('positions.index', compact('positions'));
//    }
}
