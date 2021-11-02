@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('store:list') }}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title</label>
                          <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Description</label>
                          <input type="text" name="description" class="form-control" id="description" aria-describedby="emailHelp" placeholder="Enter description">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Date</label>
                            <input type="date" name="date" class="form-control" id="date" aria-describedby="emailHelp" placeholder="Enter date">
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection