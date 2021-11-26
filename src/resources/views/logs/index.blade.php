<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Logs') }}
        </h2>
    </x-slot>
    <div class="container">

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Id</th>
                    <th>Utilisateur</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td>{{ $log->created_at }}</td>
                        <td>{{ $log->loggable_type }}</td>
                        <td>{{ $log->loggable_id }}</td>
                        <td>{{ $log->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center pagination-lg">
            {{ $logs->links('pagination::bootstrap-4') }}
        </div>
    </div>
</x-app-layout>
