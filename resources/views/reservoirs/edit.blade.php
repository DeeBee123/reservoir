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
                        <form action="{{route('reservoir.update', $reservoir->id)}}" method="POST">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text" name="title" class="form-control" value="{{$reservoir->title}}">
                        </div>
                        <div class="form-group">
                            <label>Area:</label>
                            <input type="text" name="area" class="form-control" value="{{$reservoir->area}}">
                        </div>
                        <div class="form-group">
                            <label>About:</label>
                            <textarea type="text" name="about" id="mce" cols="30" rows="10" >{{$reservoir->about}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-dark">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
