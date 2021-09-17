@extends('layouts.app')
@section('content')


    <div class="card-body table-responsive-sm">
        <table class="table table-hover table-light">
            <tr>
                <th>Title</th>
                <th>Area</th>
                <th>About</th>
            </tr>
            @foreach ($reservoirs as $reservoir)
                <tr>
                    <td>{{ $reservoir->title }}</td>
                    <td>{{ $reservoir->area }}</td>
                    <td>{!! $reservoir->about !!}</td>
                    <td>
                        <form action={{ route('reservoir.destroy', $reservoir->id) }} method="POST">
                            <a href="{{ route('reservoir.edit', $reservoir->id) }}" class="btn btn-info">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">

                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('reservoir.create') }}" class="btn btn-dark">Add</a>
        </div>
    </div>
@endsection
