@extends('computers.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('computers.index') }}"> Back</a>
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
    <form action="{{ route('computers.store') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <label for="serial-number" class="form-label">Numero de série</label>
                <input type="text" name="serial_number" id="serial-number" class="form-control" placeholder="XXXX-XXXX">
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
        <div class="col-md-12">
            <div class="form-group">
                <label for="desc" class="form-label">Description</label>
                <input type="text" id="desc" name="description" class="form-control" placeholder="Description">
            </div>
        </div>
        @foreach ($components as $component)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="brands_ids[]" value="{{ $component->id }}"
                    id="{{ $component->serial_number }}">
                <label class="form-check-label" for="{{ $component->serial_number }}">
                    {{ $component->comment }}
                </label>
            </div>
        @endforeach
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection
