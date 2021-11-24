<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des ordinateurs') }}
        </h2>
    </x-slot>
    <div class="container">


        <div class="row">
            <div class="col-lg-12 margin-tb">

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
                            @if ($user->role->name == 'admin')
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <form action="{{ route('computers.destroy', $computer->id) }}" method="POST"
                                            class="form-group inline">
                                            <a class="btn btn-info form-control my-1 dropdown-item"
                                                href="{{ route('computers.show', $computer->id) }}">Voir</a>
                                            <a class="btn btn-primary form-control my-1 dropdown-item"
                                                href="{{ route('computers.edit', $computer->id) }}">Editer</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger form-control my-1 dropdown-item">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <a class="btn btn-primary my-1"
                                    href="{{ route('computers.show', $computer->id) }}">Voir</a>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <div class="d-flex justify-content-center pagination-lg">
            {{ $computers->links('pagination::bootstrap-4') }}
        </div>
    </div>
</x-app-layout>
