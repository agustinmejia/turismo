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
                    $hotel = \App\Models\Hotel::with('type', 'category', 'group', 'city', 'certificates')->where('id', $id)->first();
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
                                <p>{{ $hotel->email }}</p>
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
                                            <th>Fecha de expiración</th>
                                            {{-- <th>Archivo</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $cont = 1;
                                        @endphp
                                        @forelse ($hotel->certificates as $item)
                                            <tr>
                                                <td>{{ $cont }}</td>
                                                <td>{{ $item->type }}</td>
                                                <td>{{ $item->code }}</td>
                                                <td>{{ date('d/m/Y', strtotime($item->expiration)) }} <br> <small>{{ \Carbon\Carbon::parse($item->expiration)->diffForHumans() }}</small> </td>
                                            </tr>
                                            @php
                                                $cont++;
                                            @endphp
                                        @empty
                                            <tr>
                                                <td colspan="4"><h4 class="text-center">No tiene certificados registrados</h4></td>
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

@stop

@section('javascript')
    <script>
        $(document).ready(function () {
            
        });
    </script>
@stop
