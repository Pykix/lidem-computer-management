<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $provider->name }}
        </h2>
    </x-slot>
    <div class="container">
        <ul>
            <li>Adresse: {{ $provider->address }}</li>
            <li>Téléphone: {{ $provider->phone }}</li>
            <li>Pays: {{ $provider->country }}</li>
            <li>Siret: {{ $provider->siret }}</li>
            <li>Interne a l'idem: {{ $provider->is_intern == 1 ? 'Oui' : 'Non' }}</li>
            <li>Commentaire: {{ $provider->comment }}</li>
        </ul>
        <br>
        <hr>
        <br>
        <h2 class="text-center my-4">Historique des prise en charges</h2>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>Ordinateur</td>
                    <td>Cause</td>
                    <td>Retour en stock</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($repairs as $repair)
                    <tr>
                        <td>{{ $repair->computer->serial_number }}</td>
                        <td>{{ $repair->breakdowns->label }}</td>
                        <td>{{ $repair->computer->is_avaible }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
