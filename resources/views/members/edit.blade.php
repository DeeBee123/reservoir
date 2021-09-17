@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-light">
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
                            <form action="{{ route('member.update', $member->id) }}" method="POST">
                                @csrf @method("PUT")
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ $member->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Surname:</label>
                                    <input type="text" name="surname" class="form-control"
                                        value="{{ $member->surname }}">
                                </div>
                                <div class="form-group">
                                    <label>Live:</label>
                                    <input type="text" name="live" class="form-control"
                                        value="{{ $member->live }}">
                                </div>
                                <div class="form-group">
                                    <label>Experience:</label>
                                    <input type="number" name="experience" class="form-control"
                                        value="{{ $member->experience }}">
                                </div>
                                <div class="form-group">
                                    <label>Experience:</label>
                                    <input type="number" name="experience" class="form-control"
                                        value="{{ $member->registered }}">
                                </div>
                                <div class="form-group">
                                    <label>Reservoir:</label>
                                    <select name="reservoir_id" id="" class="form-control">
                                        <option selected disabled>Select Reservoir</option>
                                        @foreach ($reservoirs as $reservoir)
                                            <option value="{{ $reservoir->id }}" @if ($reservoir->id == $member->id) selected="selected" @endif>
                                                {{ $reservoir->title  }}</option>
                                        @endforeach
                                    </select>
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
