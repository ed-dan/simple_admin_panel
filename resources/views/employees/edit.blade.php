@extends('layouts.admin-lte')

@section('content')
    <div>
        <h2 class="text-2xl font-bold uppercase mb-1">Add Employee</h2>
        <link rel="stylesheet" href="/css/app.css">
        <form class="form-horizontal" method="POST" action="{{ route('employee.update', $employee->id) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group row">
                    <label for="photo" class="col-sm-2 col-form-label">Employee photo</label>
                    <div class="col-sm-10">
                        <div class="form-inline">
                            <img class="image-update hidden w-40 mr-1 md:inline border border-gray-200 rounded p-2 w-full"
                                 src="{{$employee->photo ? asset('storage/' . $employee->photo) : asset('/images/no-image.png')}}"
                                 alt=""/>
                            <h1 class="">?</h1>
                        </div>
                        <input type="file" class="form-control mt-3" name="photo"/>
                    </div>
                    @error('photo')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="name" placeholder="Enter your name"  value="{{ $employee->name }}">
                    </div>
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="phone" placeholder="Required format +380 (xx) xx xx xxx"  value="{{ $employee->phone }}">
                    </div>
                    @error('phone')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label"> Contact Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control"  name="email" placeholder="Enter your email"  value="{{ $employee->email }}">
                    </div>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="salary" class="col-sm-2 col-form-label">Salary</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="salary" placeholder="From 000 to 00000" value="{{ $employee->salary }}"/>
                    </div>
                    @error('salary')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div  class="form-group row mr-0 " >
                    <label for="position_id" class="col-sm-2 col-form-label">Position</label>
                    <div class="col-sm-10">
                        <select name="position_id"  class="select-width form-control ">
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
                    @error('position_id')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="date_of_employment" class="col-sm-2 col-form-label">Date of employment</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control"  name="date_of_employment"  placeholder="Example: Remote, Boston MA, etc"  value="{{ $employee->date_of_employment }}">
                    </div>
                    @error('date_of_employment')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="head" class="col-sm-2 col-form-label">Head</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="head" placeholder="You need to choose Head"  value="{{ $employee->head }}">
                    </div>
                    @error('head')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-default">
                    <a href="/" class="text-black"> Back </a>
                </button>
                <button type="submit" class="btn btn-info float-right">Update</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection


