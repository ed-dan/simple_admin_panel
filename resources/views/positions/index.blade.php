@extends('layouts.admin-lte')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::guest())
        You need to <a href="/login">
            login
        </a> or <a href="/register"> register </a> to update table
    @else
        @include('partials._header')

        @include('partials._search')
        <div class="mt-3 ">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                        <tr>
                            <th> @sortablelink('title', 'Title', ['filter' => 'active, visible'], ['class' =>
                                'link-color'])
                            </th>
                            <th> @sortablelink('updated_at', 'Last Update', ['filter' => 'active, visible'], ['class' =>
                                'link-color'])
                            </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($positions as $position)

                            <tr>
                                <td>{{ $position->title }}</td>
                                <td>{{ $position->updated_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action="">
                                            <button type="button" class="btn btn-default">
                                                <a href="{{ route('position.edit', $position->id) }}">
                                                    <ion-icon name="pencil-outline"></ion-icon>
                                                </a>
                                            </button>
                                        </form>
                                        <link rel="stylesheet" href="/css/app.css">
                                        <form method="POST" action="{{ route('position.delete', $position->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit"
                                                    class="btn btn-block btn-outline-danger  show-alert-delete-box"
                                                    data-toggle="tooltip" title='Delete'>
                                                <ion-icon name="trash-outline"></ion-icon>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <div class="mt-3 ">
                    {{ $positions->links() }}
                </div>
            </div>
        </div>
    @endif
@endsection

