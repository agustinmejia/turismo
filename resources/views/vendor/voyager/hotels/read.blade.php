@extends('voyager::master')

@section('page_title', 'Viendo Hotel')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-company"></i> Viendo Hotel
        <a href="{{ route('voyager.hotels.index') }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            Volver a la lista
        </a>
    </h1>
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">
                @php
                    $url = explode('/', $_SERVER['REQUEST_URI']);
                    $id = $url[count($url)-1];
                    $hotel = \App\Models\Hotel::with('type', 'category', 'group', 'city', 'documents.type')->where('id', $id)->first();
                @endphp
                <div class="panel panel-bordered" style="padding-bottom:5px;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Tipo</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ $hotel->type->name }}</p>
                            </div>
                            <hr style="margin:0;">
                        </div>
                        <div class="col-md-6">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Categoría</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ $hotel->category->name }}</p>
                            </div>
                            <hr style="margin:0;">
                        </div>
                        <div class="col-md-6">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Cadena hotelera</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ $hotel->group ? $hotel->group->name : 'Ninguna' }}</p>
                            </div>
                            <hr style="margin:0;">
                        </div>
                        <div class="col-md-6">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Ciudad</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ $hotel->city->name }}</p>
                            </div>
                            <hr style="margin:0;">
                        </div>
                        <div class="col-md-6">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Nombre</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ $hotel->name }}</p>
                            </div>
                            <hr style="margin:0;">
                        </div>
                        <div class="col-md-6">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Telefono</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ $hotel->phone }}</p>
                            </div>
                            <hr style="margin:0;">
                        </div>
                        <div class="col-md-6">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Fax</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ $hotel->fax ?? 'Ninguno' }}</p>
                            </div>
                            <hr style="margin:0;">
                        </div>
                        <div class="col-md-6">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Email</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ $hotel->email ?? 'No definido' }}</p>
                            </div>
                            <hr style="margin:0;">
                        </div>
                        <div class="col-md-6">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Propietario</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ $hotel->owner }}</p>
                            </div>
                            <hr style="margin:0;">
                        </div>
                        <div class="col-md-6">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Estado</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ $hotel->status }}</p>
                            </div>
                            <hr style="margin:0;">
                        </div>
                        <div class="col-md-12">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Dirección</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ $hotel->address }}</p>
                            </div>
                            <hr style="margin:0;">
                        </div>
                        <div class="col-md-12">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Redes sociales</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{!! $hotel->social !!}</p>
                            </div>
                            <hr style="margin:0;">
                        </div>
                        <div class="col-md-12">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Fotografías</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                @php
                                    $photos = json_decode($hotel->photos);
                                @endphp
                                @forelse ($photos as $photo)
                                    <div class="col-md-2">
                                        <img src="{{ asset('storage/'.str_replace('.', '-cropped.', $photo)) }}" width="100%">
                                    </div>
                                @empty
                                @endforelse
                            </div>
                            <hr style="margin:0;">
                        </div>
                        <div class="col-md-12">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Ubicación</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <div id="map"></div>
                            </div>
                            <hr style="margin:0;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Certificados</h3>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>n&deg;</th>
                                            <th>Tipo</th>
                                            <th>Número</th>
                                            <th>Fecha de inicio</th>
                                            <th>Fecha de expiración</th>
                                            <th>Archivo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $cont = 1;
                                        @endphp
                                        @forelse ($hotel->documents as $item)
                                            <tr>
                                                <td>{{ $cont }}</td>
                                                <td>{{ $item->type->name }}</td>
                                                <td>{{ $item->code }}</td>
                                                <td>
                                                    @if ($item->start)
                                                        {{ date('d/m/Y', strtotime($item->start)) }} <br> <small>{{ \Carbon\Carbon::parse($item->start)->diffForHumans() }}</small>
                                                    @else
                                                        No definida
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->expiration)
                                                        {{ date('d/m/Y', strtotime($item->expiration)) }} <br> <small>{{ \Carbon\Carbon::parse($item->expiration)->diffForHumans() }}</small>
                                                    @else
                                                        No definida
                                                    @endif
                                                </td>
                                                <td><a href="{{ url('storage/'.$item->file) }}" target="_blank" >Ver</a></td>
                                                <td><button type="button" data-toggle="modal" data-target="#delete-document-modal" class="btn btn-danger btn-delete-document" data-id="{{ $item->id }}"><i class="voyager-trash"></i></button></td>
                                            </tr>
                                            @php
                                                $cont++;
                                            @endphp
                                        @empty
                                            <tr>
                                                <td colspan="7"><h4 class="text-center">No tiene certificados registrados</h4></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('hotels.documents.delete', ['hotel' => $hotel->id]) }}" method="post">
        <div class="modal modal-danger fade" tabindex="-1" id="delete-document-modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="voyager-trash"></i> Desea eliminar el siguiente registro?</h4>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Sí, eliminar">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('css')
    <style>
        #map { height: 320px; width: 100%; }
    </style>
@endsection

@section('javascript')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=&v=weekly"async></script>
    <script>
        $(document).ready(function(){
            $('.btn-delete-document').click(function(){
                let id = $(this).data('id');
                $('#delete-document-modal input[name="id"]').val(id);
            });
        });

        let map;
        const defaultLocation = { lat: -14.834821, lng: -64.904159 };
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: defaultLocation,
                zoom: 15,
            });
            let location = '{{ $hotel->location }}' ? @json($hotel->location) : '';
            if(location){
                location = JSON.parse(location);
                // The marker, positioned at Uluru
                const marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
                map.setCenter(location);
            }
        }
    </script>
@stop
