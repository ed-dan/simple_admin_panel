@extends('layouts.admin-lte')
@section('content')
    <div>
        <h2 class="text-2xl font-bold uppercase mb-1">Add Employee</h2>
        <link rel="stylesheet" href="/css/app.css">
        <form class="form-horizontal" method="POST" action="{{ route('employee.update', $employee->id) }}" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <label for="photo" class="col-sm-2 col-form-label">Employee photo</label>
                    <div class="col-sm-10">
                        <div class="form-inline">
                            <img class="image-update hidden w-40 mr-1 md:inline border border-gray-200 rounded p-2 w-full"
                                 src="{{$employee->photo ? asset('storage/' . $employee->photo) : asset('/images/no-image.png')}}"
                                 alt=""/>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="name" placeholder="Enter your name"  value="{{ $employee->name }}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="phone" placeholder="Required format +380 (xx) xx xx xxx"  value="{{ $employee->phone }}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label"> Contact Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control"  name="email" placeholder="Enter your email"  value="{{ $employee->email }}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="salary" class="col-sm-2 col-form-label">Salary</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="salary" placeholder="From 000 to 00000" value="{{ $employee->salary }}" disabled/>
                    </div>
                </div>

                <div  class="form-group row mr-0 " >
                    <label for="position_id" class="col-sm-2 col-form-label">Position</label>
                    <div class="col-sm-10">
                        <select name="position_id"  class="select-width form-control" disabled>
                            @foreach($positions as $position)
                                @if($position->id === $employee->position_id )
                                    <option value="{{$employee->position_id}}">{{ $position->title }}</option>
                                @endif
                            @endforeach
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date_of_employment" class="col-sm-2 col-form-label">Date of employment</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control"  name="date_of_employment"  placeholder="Example: Remote, Boston MA, etc" disabled  value="{{ $employee->date_of_employment }}">
                    </div>

                </div>

                <div class="form-group row">
                    <label for="head" class="col-sm-2 col-form-label">Head</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="head" placeholder="You need to choose Head"  value="{{ $employee->head }}" disabled>
                    </div>
                </div>


            </div>
            <div class="card-footer">
                <button class="btn btn-default">
                    <a href="/" class="text-black"> Back </a>
                </button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection



@section('content')
    <div>
        <div class="p-10 max-w-lg mx-auto mt-10">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">Show Employee</h2>
            </header>
            <div class="mb-6">
                <label for="photo" class="inline-block text-lg mb-2">
                    Employee photo
                </label>
                <img class="hidden w-40 mr-1 md:inline border border-gray-200 rounded p-2 w-full"
                     src="{{asset('storage/' . $employee->photo)}}"
                     alt=""/>
            </div>
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                       value="{{ $employee->name }}" disabled/>
            </div>
            <div class="mb-6">
                <label for="phone" class="inline-block text-lg mb-2">Phone Number</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="phone"
                       placeholder="Example: Senior Laravel Developer" value="{{ $employee->phone }}" disabled/>
            </div>
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">
                    Contact Email
                </label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                       value="{{ $employee->email }}" disabled/>
            </div>
            <div class="mb-6">
                <label for="salary" class="inline-block text-lg mb-2">Salary</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="salary"
                       placeholder="Example: 1111" value="{{ $employee->salary }}" disabled/>
            </div>
            <div class="mb-6">
                <label for="position" class="inline-block text-lg mb-2">Position</label>
                <select name="position_id" class="border border-gray-200 rounded p-2 w-full" disabled>

                    @foreach($positions as $position)
                        @if($position->id === $employee->position_id )
                            <option value="{{$employee->position_id}}">{{ $position->title }}</option>
                        @endif
                    @endforeach
                </select>

            </div>
            <div class="mb-6">
                <label for="date_of_employment" class="inline-block text-lg mb-2">Date of employment</label>
                <input type="date" class="border border-gray-200 rounded p-2 w-full" name="date_of_employment"
                       placeholder="Example: Remote, Boston MA, etc" value="{{ $employee->date_of_employment }}"
                       disabled/>
            </div>

            <div class="mb-6">
                <label for="head" class="inline-block text-lg mb-2">
                    Head
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="head"
                       value="{{ $employee->head }}" disabled/>
            </div>
            <div class="mb-6">
                <a href="{{ route('employee.index') }}" class="text-black ml-4 "><h2>Back</h2></a>
            </div>
            </form>
        </div>
    </div>
@endsection


