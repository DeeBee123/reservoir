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

                            <form action="{{ route('member.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Surname:</label>
                                    <input type="text" name="surname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Live:</label>
                                    <input type="text" name="live" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Experience:</label>
                                    <input type="number" name="experience" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Registered:</label>
                                    <input type="number" name="registered" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Reservoir:</label>
                                    <select name="reservoir_id" id="" class="form-control">
                                        <option selected disabled>Select Reservoir</option>
                                        @foreach ($reservoirs as $reservoir)
                                            <option value="{{ $reservoir->id }}">{{ $reservoir->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
