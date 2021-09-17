@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form action="{{route('reservoir.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text" name="title" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Area:</label>
                            <input type="text" name="area" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label>About:</label>
                            <textarea name="about" id="" cols="30" rows="10" class="form-control"  style="resize:none"></textarea>
                        </div>

                        <button type="submit" class="btn btn-dark">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
