<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservation en cours') }}
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
                @foreach ($lends as $lend)
                    <tr>
                        <td>{{ $lend->user->name }}</td>
                        <td>{{ $lend->start_date }} -
                            {{ $lend->end_date }}</td>
                        <td>{{ $lend->computer->serial_number }}</td>

                        {{-- <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <form action="{{ route('lends.destroy', $lend->id) }}" method="POST"
                                        class="form-group inline">
                                        <a class="btn btn-success form-control my-1 dropdown-item" href="#">Accepter</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger form-control my-1 dropdown-item">Refuser</button>
                                    </form>
                                </div>
                            </div> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center pagination-lg">
            {{ $lends->links('pagination::bootstrap-4') }}
        </div>
    </div>
</x-app-layout>
