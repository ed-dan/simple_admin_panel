@extends('layouts.admin-lte')

@section('content')
    <div>
        <div class="p-10 max-w-lg mx-auto mt-10">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">Edit Position</h2>
            </header>
            <form method="POST" action="{{ route('position.update', $position->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Position Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="title" placeholder="Enter position title"
                               value="{{$position->title}}">
                    </div>
                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="card-footer">
                    <button class="btn btn-default">
                        <a href="{{ route('position.index') }}" class="text-black"> Back </a>
                    </button>
                    <button type="submit" class="btn btn-info float-right">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection



