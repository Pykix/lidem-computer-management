@extends('computers.layout')
@section('content')
    <table class="table table-bordered">
        <tr>
            <th>Numero de serie</th>
            <th>Marque</th>
            <th>Disponible</th>
            <th>Description</th>
        </tr>
        @foreach ($computers as $computer)
            <tr>
                <td>{{ $computer->serial_number }}</td>
                <td>{{ $computer->brand_id }}</td>
                <td>{{ $computer->is_avaible }}</td>
                <td>{{ $computer->comment }}</td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center pagination-lg">
        {!! $computers->links('pagination::bootstrap-4') !!}
    </div>
@endsection
