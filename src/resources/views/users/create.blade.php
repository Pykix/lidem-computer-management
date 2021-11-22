<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('IDEM computer admin panel') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ajouter un utilisateur</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}">Annuler</a>
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
    <form action="{{ route('users.store') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="form-label">Nom</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="John Doe">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="email@idem.education.fr">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="text" id="password" name="password" class="form-control" placeholder="********">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="repassword" class="form-label">Verification du mot de passe</label>
                <input type="text" id="repassword" name="repassword" class="form-control" placeholder="********">
            </div>
        </div>
        <div class="col-md-6">
            <label for="role" class="form-label">
                Role
            </label>
            <select class="form-select" id="role" aria-label="Default select example" name="role_id">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Créer</button>
        </div>
    </form>


</x-app-layout>