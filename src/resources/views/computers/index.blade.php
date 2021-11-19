@extends('computers.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Idem Computer Park</h2>
            </div>
            <div class="pull-right my-4">
                <a class="btn btn-success" href="{{ route('computers.create') }}"> Ajouter une référence</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="{{ route('computers.index') }}" action="POST">
        <label for="filter">Disponibilité</label>
        <select class="form-select" name="filter" id="filter">
            <option selected>Tous</option>
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>
        <button type="submit" class="btn btn-primary  my-1">Filter</button>

    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Numero de serie</th>
                <th>Marque</th>
                <th>Disponible</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($computers as $computer)
                <tr>
                    <td>{{ $computer->serial_number }}</td>
                    <td>{{ $computer->brand->name }}</td>
                    @if ($computer->is_avaible)
                        <td>Oui</td>
                    @else
                        <td>Non</td>
                    @endif
                    <td>{{ $computer->comment }}</td>
                    <td>
                        <form action="{{ route('computers.destroy', $computer->id) }}" method="POST"
                            class="form-group inline">
                            <a class="btn btn-info form-control my-1"
                                href="{{ route('computers.show', $computer->id) }}">Voir</a>
                            <a class="btn btn-primary form-control my-1"
                                href="{{ route('computers.edit', $computer->id) }}">Editer</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger form-control my-1">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div class="d-flex justify-content-center pagination-lg">
        {{ $computers->links('pagination::bootstrap-4') }}
    </div>

@endsection
