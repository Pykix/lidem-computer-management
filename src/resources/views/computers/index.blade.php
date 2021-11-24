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

        @livewire('search-computer', ['computers' => $computers])



    </div>

</x-app-layout>
