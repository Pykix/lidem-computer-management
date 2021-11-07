@extends('computers.layout')

@section('content')

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
                    <input type="text" name="serial_number" value="{{ $computer->serial_number }}" class="form-control"
                        placeholder="XXXX-XXXX">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Marque:</strong>
                    <input type="text" name="brand_id" value="{{ $computer->brand_id }}" class="form-control"
                        placeholder="Asus, Apple, Hp...">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" value="{{ $computer->comment }}" class="form-control"
                        placeholder="Blablabla">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </div>
    </form>
@endsection
