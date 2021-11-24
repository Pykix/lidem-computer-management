<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajout d\'une type de panne') }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('breakdowns.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('breakdowns.store') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <label for="label" class="form-label">Nom</label>
                <input type="text" name="label" id="label" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <label for="type" class="form-label">
                Type
            </label>
            <input type="text" name="type" id="type" class="form-control">

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Créer</button>
        </div>
    </form>

</x-app-layout>
