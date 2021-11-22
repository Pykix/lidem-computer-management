<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('IDEM computer admin panel') }}
        </h2>
    </x-slot>
    <div class="container">

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Utilisateur</th>
                    <th>Dates</th>
                    <th>Ordinateur</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendingLends as $pendingLend)
                    <tr>
                        <td>{{ $pendingLend->user->name }}</td>
                        <td>{{ $pendingLend->request_start_date }} -
                            {{ $pendingLend->request_end_date }}</td>
                        <td>{{ $pendingLend->computer->serial_number }}</td>

                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <form action="{{ route('pendinglends.destroy', $pendingLend->id) }}" method="POST"
                                        class="form-group inline">
                                        <a class="btn btn-success form-control my-1 dropdown-item" href="#">Accepter</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger form-control my-1 dropdown-item">Refuser</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center pagination-lg">
            {{ $pendingLends->links('pagination::bootstrap-4') }}
        </div>
    </div>
</x-app-layout>
