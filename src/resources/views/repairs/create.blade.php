<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enregistrer une reparation') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('repairs.index') }}"> Back</a>
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
        <form action="{{ route('repairs.store') }}" method="post" class="row g-3">
            @csrf
            @method('POST')
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Evil Corp">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone" class="form-label">Téléphone</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="666-1337-42">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="siret" class="form-label">Siret</label>
                    <input type="text" name="siret" id="siret" class="form-control" placeholder="XXXXXXXXXXXXXXXX">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="country" class="form-label">Pays</label>
                    <input type="text" name="country" id="country" class="form-control" placeholder="Hell">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address" class="form-label">Adresse</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Hell">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="zip" class="form-label">Zip</label>
                    <input type="text" name="zip" id="zip" class="form-control" placeholder="66666">
                </div>
            </div>
            <div class="form-floating">
                <label for="floatingTextarea">Commentaire</label>
                <textarea class="form-control" placeholder="" name="comment" id="floatingTextarea"></textarea>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="is_intern" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Interne a l'idem
                </label>
            </div>
            <button class="btn btn-primary" type="submit">Créer</button>
        </form>
    </div>
</x-app-layout>
