@extends('computers.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Idem Computer Park</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('computers.create') }}"> Ajouter une référence</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif
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
                <td>
                    <form action="{{ route('computers.destroy', $computer->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('computers.show', $computer->id) }}">Voir</a>
                        <a class="btn btn-primary" href="{{ route('computers.edit', $computer->id) }}">Editer</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center pagination-lg">
        {!! $computers->links('pagination::bootstrap-4') !!}
    </div>
@endsection
