@extends('voyager::master')

@section('page_title', 'Estadísticas nacionales')

@section('page_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h1 class="page-title">
                    <i class="voyager-pie-chart"></i> Estadísticas nacionales
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
                            <form id="form-report" action="{{ route('reports.international_activities.list') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="hotel_id">Prestador de sercvicios</label>
                                    <select name="hotel_id" class="form-control select2" required>
                                        <option value="">--Seleccione el prestador de servicios--</option>
                                        @foreach ($hotels as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->type->name }} {{ $item->category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    {{-- <label for="date">Fecha</label> --}}
                                    <div class="input-group">
                                        <input type="number" name="year" step="1" max="{{ date('Y') }}" class="form-control" value="{{ date('Y') }}" required>
                                        <div class="input-group-btn">
                                            <select name="month" class="form-control" style="width: 150px" required>
                                                <option value="1">Enero</option>
                                                <option value="2">Febrero</option>
                                                <option value="3">Marzo</option>
                                                <option value="4">Abril</option>
                                                <option value="5">Mayo</option>
                                                <option value="6">Junio</option>
                                                <option value="7">Julio</option>
                                                <option value="8">Agosto</option>
                                                <option value="9">Septiembre</option>
                                                <option value="10">Octubre</option>
                                                <option value="11">Noviembre</option>
                                                <option value="12">Diciembre</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-info"><i class="voyager-search"></i> Generar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="results"></div>
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
