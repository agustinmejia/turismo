@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Añadir huesped')

@section('page_header')
    <div class="row">
        <div class="col-md-6">
            <h1 class="page-title">
                <i class="voyager-list"></i>
                Añadir huesped
            </h1>
        </div>
        <div class="col-md-6 text-right" style="margin-top: 30px">
            <button data-toggle="modal" data-target="#generate_report-modal" class="btn btn-success"><i class="voyager-list"></i> Generar informe</button>
        </div>
    </div>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <form action="{{ route('hotels.register.datail.store', ['name' => $slug]) }}" method="POST">
                @csrf
                <input type="hidden" name="redirect" value="voyager.hotels.index">
                <div class="col-md-12">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            @include('partials.form-register-activity')
                        </div>
                        <div class="panel-footer text-right">
                            <button type="submit" class="btn btn-primary">Guardar <i class="voyager-check"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <form action="{{ route('hotels.activities.pdf', ['hotel' => $id]) }}" method="POST" target="_blank">
        <div class="modal modal-success fade" tabindex="-1" id="generate_report-modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="voyager-trash"></i> Desea eliminar el siguiente registro?</h4>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-success" value="Sí, generar">
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('javascript')
    <script>
        $(document).ready(function(){

        });
    </script>
@stop
