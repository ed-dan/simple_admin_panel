@extends('layouts.admin-lte')
@section('content')
    <div class="form-group row mt-3">
        <label for="title" class="col-sm-2 col-form-label">Position Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  name="title" placeholder="Enter position title"
                   value="{{$position->title}}" disabled>
        </div>
    </div>
       Updated at: <p>{{ $position->updated_at }}</p>
       Created at: <p>{{ $position->created_at }}</p>
    <button class="btn btn-default">
        <a href="{{ route('position.index') }}" class="text-black"> Back </a>
    </button>
@endsection


