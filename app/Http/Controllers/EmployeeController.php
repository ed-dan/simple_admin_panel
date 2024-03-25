<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function averageSalaries(Request $request)
    {

        //return response()->download($data);
    }

    public function jsonFileDownload()
    {
        $data = json_encode(['Text One', 'Text Two', 'Text Three']);

        $jsongFile = time() . '_file.json';
        File::put(public_path('/upload/json/'.$jsongFile), $data);
        return Response::download(public_path('/upload/jsonfile/'.$jsongFile));
    }

    public function autocomplete(Request $request)
    {
        $data = Employee::select("name as value", "id")
            ->where('name', 'LIKE', '%'. $request->get('search'). '%')
            ->limit(5)
            ->get();

        return response()->json($data);
    }

    // show all listing
    public static function index()
    {
        Log::emergency('The system is down!');
        return view('employees.index', [ 'name' => '/', 'title' => 'employees',
            'employees' => Employee::sortable()->latest()->orderBy('name')->filter(request([ 'search']))
                ->paginate(10),
            'positions' => Position::all()
        ]);
    }

    // show single listing
    public function show(Employee $employee)
    {
        return view('employees.show', [
            'employee' => $employee,
            'positions' => Position::all()
        ]);
    }

// show create listing
    public function create()
    {
        return view('employees.create', ['positions' => Position::all()]);
    }

    // store listing data
    public function store(StoreEmployeeRequest $request)
    {
        $formFields = $request->validated();
        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public');
        }
        Employee::create($formFields);
        return redirect('/')->with('message', 'Listing Created');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'), ['positions' => Position::all()]);
    }

    public function update(Employee $employee)
    {
        $formFields = \request()->validate([
            'name' => 'required',
            'phone' => ['required', Rule::unique('employees', 'phone')->ignore($employee->id)],
            'salary' => 'required',
            'position_id' => 'required',
            'email' => ['required', 'email', Rule::unique('employees', 'email')->ignore($employee->id)],
            'head' => 'required',
            'date_of_employment' => 'required'
        ]);

        if (request()->hasFile('photo')) {
            $formFields['photo'] = request()->file('photo')->store('photos', 'public');
        }
        $employee->update($formFields);

        return redirect()->route('employee.show', $employee->id);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index');
    }
}
