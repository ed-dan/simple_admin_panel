@extends('layouts.admin-lte')


@section('content')
    @if(\Illuminate\Support\Facades\Auth::guest())
        You need to login or register to update table
    @else
        @include("partials._autocomplete-input")
        @include('partials._header')
        @include('partials._search')

        <div class="mt-30 ">
            <div class="card-body p-0">
                <div class="table-responsive">
                      <table class="table m-0">
                        <thead>
                        <tr>
                            <th>Photo</th>
                            <th>
                                @sortablelink('name', 'Name', ['filter' => 'active, visible'], ['class' =>
                                'link-color'])
                            </th>
                            <th>
                                @sortablelink('position_id', 'Position', ['filter' => 'active, visible'], ['class' =>
                                'link-color'])
                            </th>
                            <th>
                                @sortablelink('date_of_employment', 'Date of employment',
                                ['filter' => 'active, visible'], ['class' => 'link-color '])
                            </th>
                            <th>Phone Number</th>
                            <th>
                                @sortablelink('email', 'Email', ['filter' => 'active, visible'], ['class' =>
                                'link-color'])
                            </th>
                            <th>
                                @sortablelink('salary', 'Salary', ['filter' => 'active, visible'], ['class' =>
                                'link-color'])
                            </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)

                            <tr>
                                <td>
                                    <img class="circular--square hidden w-20 mr-1 md:inline"
                                         src="{{$employee->photo ? asset('storage/' . $employee->photo) : asset('/images/no-image.png')}}"
                                         alt=""/>
                                </td>
                                <td>{{ $employee->name }}</td>
                                <td>
                                    @foreach($positions as $position)
                                        @if($position->id === $employee->position_id)
                                            {{ $position->title }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $employee->date_of_employment }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>${{ $employee->salary }}</td>
                                <td>
                                    <div class="md:inline" data-color="#00a65a"
                                         data-height="20">
                                        <div class="btn-group">
                                            <form action="">
                                                <button type="button" class="btn btn-default">
                                                    <a href="{{ route('employee.edit', $employee->id) }}">
                                                        <ion-icon name="pencil-outline"></ion-icon>
                                                    </a>
                                                </button>
                                            </form>
                                            <link rel="stylesheet" href="/css/app.css">
                                            <form method="POST" action="{{ route('employee.delete', $employee->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit"
                                                        class="btn btn-block btn-outline-danger show-alert-delete-box"
                                                        data-toggle="tooltip" title='Delete'>
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 ">
                    {{ $employees->links() }}
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    @endif
@endsection
