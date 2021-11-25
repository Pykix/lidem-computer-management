<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ordinateur en réparations') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">

                <div class="pull-right my-4">
                    <a class="btn btn-success" href="{{ route('repairs.create') }}"> Enregistrer une reparation</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Numero de serie</th>
                    <th>Cause</th>
                    <th>Prestataire</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($repairs as $repair)
                    <tr>
                        <td>{{ $repair->computer->serial_number }}</td>
                        <td>{{ $repair->breakdowns_label }}</td>
                        <td>{{ $repair->provider->name }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <form action="{{ route('repairs.destroy', $repair->id) }}" method="POST"
                                        class="form-group inline">
                                        <a class="btn btn-info form-control my-1 dropdown-item"
                                            href="{{ route('repairs.show', $repair->id) }}">Voir</a>
                                        <a class="btn btn-primary form-control my-1 dropdown-item"
                                            href="{{ route('repairs.edit', $repair->id) }}">Editer</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger form-control my-1 dropdown-item">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center pagination-lg">
            {{ $repairs->links('pagination::bootstrap-4') }}
        </div>
    </div>
</x-app-layout>
