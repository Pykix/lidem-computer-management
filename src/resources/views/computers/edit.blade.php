<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier un ordinateur') }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Modifier la reference</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('computers.index') }}">Retour</a>

            </div>

        </div>

    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> quelque chose ne va pas avec votre saisie.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <form action="{{ route('computers.update', $computer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Numero de série:</strong>
                    <input type="text" name="serial_number" value="{{ $computer->serial_number }}"
                        class="form-control" placeholder="XXXX-XXXX">
                </div>
            </div>
            <div class="col-md-6">
                <label for="brand" class="form-label">
                    Marque
                </label>
                <select class="form-select" id="brand" aria-label="Default select example" name="brand_id">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" value="{{ $computer->comment }}" class="form-control"
                        placeholder="Blablabla">
                </div>
            </div>
            @foreach ($components as $component)

                @if ($computer->components->contains('id', $component->id))
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="brands_ids[]"
                            value="{{ $component->id }}" id="{{ $component->serial_number }}" checked>
                        <label class="form-check-label" for="{{ $component->serial_number }}">
                            {{ $component->comment }}
                        </label>
                    </div>
                @else
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="brands_ids[]"
                            value="{{ $component->id }}" id="{{ $component->serial_number }}">
                        <label class="form-check-label" for="{{ $component->serial_number }}">
                            {{ $component->comment }}
                        </label>
                    </div>
                @endif
            @endforeach
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </div>
    </form>
</x-app-layout>
