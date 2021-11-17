@extends('computers.layout')



@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Reference n° {{ $computer->serial_number }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('computers.index') }}"> Back</a>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Marque:</strong>
                {{ $computer->brand->name }}
            </div>
        </div>
    </div>

@endsection
