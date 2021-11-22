<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('IDEM computer admin panel') }}
        </h2>
    </x-slot>
    <div class="container">
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

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Demander une reservation
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Demande de reservation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <input type="text" name="daterange" />

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="button" class="btn btn-primary">Envoyer la demande</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'center'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('DD-MM-YYY') + ' to ' + end
                    .format('DD-MM-YYY'));
            });
        });
    </script>
    <!--Section: Block Content-->

</x-app-layout>
