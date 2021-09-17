@extends('layouts.app')
@section('content')
<div class="card-body">
    <label>Reservoir:</label>
    <form class="form-inline" action="{{ route('member.index') }}" method="GET">
        <select name="reservoir_id" id="" class="form-control">
            <option value="" selected>All</option>
            @foreach ($reservoirs as $reservoir)
            <option value="{{ $reservoir->id }}"
                @if($reservoir->id == app('request')->input('reservoir_id'))
                    selected="selected"
                @endif>{{ $reservoir->title }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-dark">Filter</button>
    </form>
</div>

<div class="card-body table-responsive-sm">
    <table class="table table-hover table-light">
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Live</th>
                <th>Experience</th>
                <th>Registered</th>
                <th>Reservoir</th>

            </tr>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->surname }}</td>
                    <td>{{ $member->live }}</td>
                    <td>{{ $member->experience }}</td>
                    <td>{{ $member->registered }}</td>
                    <td>{{ $member ->reservoir->title}}</td>

                    <td>
                        <form action={{ route('member.destroy', $member->id) }} method="POST">
                            <a href="{{ route('member.edit', $member->id) }}" class="btn btn-info">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">

                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('member.create') }}" class="btn btn-dark">Add</a>
        </div>
    </div>
@endsection
