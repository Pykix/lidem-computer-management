<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('IDEM computer admin panel') }}
        </h2>
    </x-slot>
    <div class="container">


        <div class="row">
            <div class="col-lg-12 margin-tb">

                <div class="pull-right my-4">
                    <a class="btn btn-success" href="{{ route('users.create') }}"> Ajouter un utilisateur</a>
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
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>

                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        class="form-group inline">
                                        <a class="btn btn-info form-control my-1 dropdown-item"
                                            href="{{ route('users.show', $user->id) }}">Voir</a>
                                        <a class="btn btn-primary form-control my-1 dropdown-item"
                                            href="{{ route('users.edit', $user->id) }}">Editer</a>
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
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
    </div>
</x-app-layout>
