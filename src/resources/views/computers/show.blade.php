@extends('computers.layout')



@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('computers.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <!--Section: Block Content-->
    <section class="mb-5">

        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <div id="mdb-lightbox-ui"></div>
                <div class="mdb-lightbox">
                    <div class="row product-gallery mx-1">
                        <div class="col-12 mb-0">
                            <figure class="view overlay rounded z-depth-1 main-img">
                                <img src="{{ $computer->picture }}" class="img-fluid z-depth-1">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h5>Reference n° {{ $computer->serial_number }}</h5>

                <div class="table-responsive">
                    <table class="table table-sm table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Marque</strong></th>
                                <td>{{ $computer->brand->name }}</td>
                            </tr>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Disponible</strong></th>
                                <td>{{ $computer->is_avaible }}</td>
                            </tr>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Description</strong></th>
                                <td>{{ $computer->comment }}</td>
                            </tr>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Materiel</strong></th>
                                @foreach ($computer->components as $component)

                                    <td>{{ $component->comment }}</td>

                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>


                <button type="button" class="btn btn-primary btn-md mr-1 mb-2">Réserver</button>
            </div>
        </div>

    </section>
    <!--Section: Block Content-->

@endsection
