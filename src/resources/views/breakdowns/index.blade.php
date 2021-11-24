<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Type de panne') }}
        </h2>
    </x-slot>
    <div class="container">


        <div class="row">
            <div class="col-lg-12 margin-tb">

                <div class="pull-right my-4">
                    <a class="btn btn-success" href="{{ route('breakdowns.create') }}"> Ajouter un type de panne</a>
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
                    <th>Nom</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($breakdowns as $breakdown)
                    <tr>
                        <td>{{ $breakdown->label }}</td>
                        <td>{{ $breakdown->type }}</td>
                        <td>
                            @if ($user->role->name == 'admin')
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <form action="{{ route('breakdowns.destroy', $breakdown->id) }}" method="POST"
                                            class="form-group inline">
                                            <a class="btn btn-info form-control my-1 dropdown-item"
                                                href="{{ route('breakdowns.show', $breakdown->id) }}">Voir</a>
                                            <a class="btn btn-primary form-control my-1 dropdown-item"
                                                href="{{ route('breakdowns.edit', $breakdown->id) }}">Editer</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger form-control my-1 dropdown-item">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <a class="btn btn-primary my-1"
                                    href="{{ route('breakdowns.show', $breakdown->id) }}">Voir</a>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center pagination-lg">
            {{ $breakdowns->links('pagination::bootstrap-4') }}
        </div>



    </div>

</x-app-layout>
