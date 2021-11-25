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
                    <label for="computers">Ordinateur</label>
                    <select name="computer_id" id="computers">
                        @foreach ($computers as $computer)
                            <option value="{{ $computer->id }}">{{ $computer->serial_number }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="breakdowns">Probleme</label>
                    <select name="breakdown_id" id="breakdowns">
                        @foreach ($breakdowns as $breakdown)
                            <option value="{{ $breakdown->id }}">{{ $breakdown->label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="providers">Reparateur</label>
                    <select name="providers_id" id="providers">
                        @foreach ($providers as $provider)
                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Créer</button>
        </form>
    </div>
</x-app-layout>
