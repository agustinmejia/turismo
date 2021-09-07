@extends('voyager::master')

@section('page_title', 'Reporte de registro de actividades')

@section('page_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h1 class="page-title">
                    <i class="voyager-logbook"></i> Reporte de registro de actividades
                </h1>
                {{-- <a href="#" class="btn btn-success btn-add-new">
                    <i class="voyager-plus"></i> <span>Crear</span>
                </a> --}}
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 0px">
                <div class="panel panel-bordered">
                    <div class="panel-body" style="padding-bottom: 0px">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <form id="form-report" action="{{ route('reports.register_activities.list') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="date">Fecha</label>
                                    <div class="input-group">
                                        <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        <div class="input-group-btn">
                                          <button class="btn btn-primary" type="submit" style="margin:-1px">
                                            <i class="voyager-search"></i>
                                          </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="results"></div>
        </div>
    </div>

    {{-- Info modal --}}
    <div class="modal modal-info fade" tabindex="-1" id="info-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-browser"></i> Información del prestador de servicio</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-bordered" style="padding-bottom:5px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-heading" style="border-bottom:0;">
                                    <h3 class="panel-title">Nombre</h3>
                                </div>
                                <div class="panel-body" style="padding-top:0;">
                                    <p id="label-name"></p>
                                </div>
                                <hr style="margin:0;">
                            </div>
                            <div class="col-md-6">
                                <div class="panel-heading" style="border-bottom:0;">
                                    <h3 class="panel-title">Ciudad</h3>
                                </div>
                                <div class="panel-body" style="padding-top:0;">
                                    <p id="label-city"></p>
                                </div>
                                <hr style="margin:0;">
                            </div>
                            <div class="col-md-6">
                                <div class="panel-heading" style="border-bottom:0;">
                                    <h3 class="panel-title">Telefono</h3>
                                </div>
                                <div class="panel-body" style="padding-top:0;">
                                    <p id="label-phone"></p>
                                </div>
                                <hr style="margin:0;">
                            </div>
                            <div class="col-md-6">
                                <div class="panel-heading" style="border-bottom:0;">
                                    <h3 class="panel-title">Email</h3>
                                </div>
                                <div class="panel-body" style="padding-top:0;">
                                    <p id="label-email"></p>
                                </div>
                                <hr style="margin:0;">
                            </div>
                            <div class="col-md-6">
                                <div class="panel-heading" style="border-bottom:0;">
                                    <h3 class="panel-title">Propietario</h3>
                                </div>
                                <div class="panel-body" style="padding-top:0;">
                                    <p id="label-owner"></p>
                                </div>
                                <hr style="margin:0;">
                            </div>
                            <div class="col-md-12">
                                <div class="panel-heading" style="border-bottom:0;">
                                    <h3 class="panel-title">Dirección</h3>
                                </div>
                                <div class="panel-body" style="padding-top:0;">
                                    <p id="label-address"></p>
                                </div>
                                <hr style="margin:0;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/loading/loading.css') }}">
@stop

@section('javascript')
    <script src="{{ url('js/main.js') }}"></script>
    <script src="{{ asset('vendor/loading/loading.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#form-report').submit(function(e){
                $('.page-content').loading({message: 'Cargando...'});
                e.preventDefault();
                $.post($(this).attr('action'), $(this).serialize(), function(res){
                    $('#results').html(res);
                    $('.page-content').loading('toggle');
                })
            });
        });
    </script>
@stop
