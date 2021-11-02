@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('To Do List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <button class="btn btn-primary" onclick="window.location='{{ route('create:list') }}'">Create List</button>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date</th>
                            <th scope="col">Reminder</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ( $lists as $key => $list)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $list->title }}</td>
                                    <td>{{ $list->description }}</td>
                                    <td>{{ $list->date }}</td>
                                    <td>
                                        @if ($list->reminder == 0)
                                            <button class="btn btn-primary" type="button" onclick="window.location='{{ route('toggle:list', $list) }}'">Set</button>
                                        @else
                                            <button class="btn btn-secondary" type="button" onclick="window.location='{{ route('toggle:list', $list) }}'">Unset</button>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary" type="button" onclick="window.location='{{ route('edit:list', $list) }}'">Edit</button>
                                        <button class="btn btn-danger" type="button" onclick="window.location='{{ route('delete:list', $list) }}'">Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection