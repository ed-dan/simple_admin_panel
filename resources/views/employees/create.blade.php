@extends('layouts.admin-lte')
@section('content')
    <div>
        <h2 class="text-2xl font-bold uppercase mb-1">Add Employee</h2>
        <link rel="stylesheet" href="/css/app.css">
        <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js')}}"></script>
        <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css') }}" />


        <form class="form-horizontal" method="POST" action="/employees" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="photo" class="col-sm-2 col-form-label">Employee photo</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="photo"/>
                    </div>
                    @error('photo')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="name" placeholder="Enter your name"  value="{{old('name')}}">
                    </div>
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                        <input id="autogap" maxlength="10" type="text" class="form-control"  name="phone"
                               placeholder="Required format 000 00 00 000"  value="{{old('phone')}}">
                    </div>

{{--                    <script>--}}
{{--                        var input = document.getElementById("autogap");--}}

{{--                        input.onkeyup = function () {--}}
{{--                            if (input.value.length > 0) {--}}
{{--                                if (input.value.length == 3 || input.value.length == 6 || input.value.length == 9) {--}}
{{--                                    input.value += " ";--}}
{{--                                }--}}
{{--                            }--}}
{{--                        }--}}
{{--                    </script>--}}

                    @error('phone')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label"> Contact Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control"  name="email" placeholder="Enter your email"  value="{{old('email')}}">
                    </div>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="salary" class="col-sm-2 col-form-label">Salary</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="salary" placeholder="From 000 to 00000" value="{{old('salary')}}"/>
                    </div>
                    @error('salary')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div  class="form-group row mr--1 " >
                    <label for="position_id" class="col-sm-2 col-form-label">Position</label>
                    <div class="col-sm-10">
                        <select name="position_id"  class="select-width form-control ">
                            <option> </option>
                            @foreach($positions as $position)
                                <option value="{{ old('position_id') ?? $position->id ?? '1'}}">
                                    {{ $position->title }}
                                </option>
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
                        <input type="date" class="form-control"  name="date_of_employment"  placeholder="Example: Remote, Boston MA, etc"  value="{{old('date_of_employment')}}">
                    </div>
                    @error('date_of_employment')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>


                <div class="form-group row">
                    <label for="head" class="col-sm-2 col-form-label">Head</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  id="search" name="head" placeholder="You need to choose Head"  value="{{old('head')}}">
                    </div>
                    <script type="text/javascript" >

                        var path = "{{ route('autocomplete') }}";

                        $( "#search" ).autocomplete({
                            source: function( request, response ) {
                                $.ajax({
                                    url: path,
                                    type: 'GET',
                                    dataType: "json",
                                    data: {
                                        search: request.term
                                    },
                                    success: function( data ) {
                                        response( data );
                                    }
                                });
                            },
                            select: function (event, ui) {
                                $('#search').val(ui.item.label);
                                console.log(ui.item);
                                return false;
                            }
                        });

                    </script>

                    @error('head')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-default">
                    <a href="/" class="text-black"> Back </a>
                </button>
                <button type="submit" class="btn btn-info float-right">Create</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection


