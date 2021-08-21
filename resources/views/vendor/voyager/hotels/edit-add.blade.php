@extends('voyager::master')

@php
    $url = $_SERVER['REQUEST_URI'];
    $url_array = explode('/', $url);
    $hotel = null;
    if($url_array[count($url_array)-1] == 'edit'){
        $id = $url_array[count($url_array)-2];
        $hotel = \App\Models\Hotel::findOrFail($id);
    }
@endphp

@section('page_title', 'Añadir Hotel')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-company"></i>
        {{ $hotel ? 'Editar Hotel' : 'Añadir Hotel' }}
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <form id="form-create" action="{{ $hotel ? route('hoteles.update', ['hotele' => $hotel->id]) : route('hoteles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($hotel)
                @method('PUT')
                @endif
                <input type="hidden" name="redirect" value="voyager.hotels.index">
                <div class="col-md-12">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="hotels_type_id">Tipo de hotel</label>
                                    <select name="hotels_type_id" id="select-hotels_type_id" class="form-control select2" required>
                                        <option value="" disabled selected>Selecciona el tipo de hotel</option>
                                        @foreach (\App\Models\HotelsType::with('categories')->where('deleted_at', NULL)->get() as $item)
                                            <option value="{{ $item->id }}" data-categories="{{ $item->categories }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="hotels_category_id">Categoría de hotel</label>
                                    <select name="hotels_category_id" id="select-hotels_category_id" class="form-control" required>
                                        <option value="" disabled selected>Ninguna</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="hotels_group_id">Cadena de hoteles a la que pertenece</label>
                                    <select name="hotels_group_id" id="select-hotels_group_id" class="form-control select2">
                                        <option value="">Ninguna</option>
                                        @foreach (\App\Models\HotelsGroup::where('deleted_at', NULL)->get() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="city_id">Ciudad</label>
                                    <select name="city_id" id="select-hotels_city_id" class="form-control select2" required>
                                        <option value="" disabled selected>Selecciona la cuidad</option>
                                        @foreach (\App\Models\City::where('deleted_at', NULL)->get() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" class="form-control" value="{{ $hotel ? $hotel->name : '' }}" placeholder="Las Palmas" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone">Telefono(s)/Celular(es)</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $hotel ? $hotel->phone : '' }}" placeholder="4628978 - 75199157" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="fax">Fax</label>
                                    <input type="text" name="fax" class="form-control" value="{{ $hotel ? $hotel->fax : '' }}" placeholder="902955354">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ $hotel ? $hotel->email : '' }}" placeholder="mail@example.com">
                                </div>
                                <div class="col-md-6">
                                    <label for="owner">Propietario</label>
                                    <input type="text" name="owner" class="form-control" value="{{ $hotel ? $hotel->owner : '' }}" required>
                                    {{-- <select name="user_id" class="form-control select2">
                                        <option value="">No definido</option>
                                        @foreach (\App\Models\User::where('deleted_at', NULL)->get() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="col-md-6">
                                    <label for="photos">Fotografías</label>
                                    <input type="file" name="photos[]" multiple class="form-control" accept="image/*" >
                                </div>
                                <div class="col-md-6">
                                    <label for="address">Dirección</label>
                                    <textarea name="address" class="form-control" rows="3" placeholder="C/ 6 de Agostos Esq. Santa Cruz Nro 1000" required>{{ $hotel ? $hotel->address : '' }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="social">Redes sociales</label>
                                    <textarea name="social" class="form-control" rows="3">{{ $hotel ? $hotel->social : '' }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="location">Ubicación</label>
                                    <div id="map"></div>
                                    <input type="hidden" name="location" value="{{ $hotel ? $hotel->location : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button type="submit" class="btn btn-primary">Guardar <i class="voyager-check"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #map { height: 320px; width: 100%; }
    </style>
@endsection

@section('javascript')
    <script>
        $(document).ready(function(){
            $('#select-hotels_type_id').change(function(){
                let categories = $('#select-hotels_type_id option:selected').data('categories');
                let categories_list = '';
                if(categories.length){
                    categories.map(category => {
                        categories_list += `<option value="${category.id}">${category.name}</option>`;
                    });
                }else{
                    categories_list += `<option value="">Ninguna</option>`;
                }
                $('#select-hotels_category_id').html(categories_list);

            });

            @if($hotel)
                $('#select-hotels_type_id').val("{{ $hotel->hotels_type_id }}").trigger('change');
                $('#select-hotels_category_id').val("{{ $hotel->hotels_category_id }}").trigger('change');
                $('#select-hotels_group_id').val("{{ $hotel->group_id }}").trigger('change');
                $('#select-hotels_city_id').val("{{ $hotel->city_id }}").trigger('change');
            @endif
        });
    </script>

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=&v=weekly"async></script>
<script>
    let map;
    const defaultLocation = { lat: -14.834821, lng: -64.904159 };
    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: defaultLocation,
            zoom: 13,
        });
        @if(!$hotel)
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    $('#form-create input[name="location"]').val(`{"lat":${pos.lat},"lng":${pos.lng}}`);
                    
                    map.setCenter(pos);
                    // The marker, positioned at Uluru
                    const marker = new google.maps.Marker({
                        position: pos,
                        map: map,
                        draggable: true
                    });
                    marker.addListener('dragend', function(e){
                        $('#form-create input[name="location"]').val(`{"lat":${e.latLng.lat()},"lng":${e.latLng.lng()}}`);
                    });
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
                );
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        @else
            let location = '{{ $hotel->location }}' ? @json($hotel->location) : '';
            if(location){
                location = JSON.parse(location);
                // The marker, positioned at Uluru
                const marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    draggable: true
                });
                marker.addListener('dragend', function(e){
                    $('#form-create input[name="location"]').val(`{"lat":${e.latLng.lat()},"lng":${e.latLng.lng()}}`);
                });
                map.setCenter(location);
            }else{
                const marker = new google.maps.Marker({
                    position: defaultLocation,
                    map: map,
                    draggable: true
                });
                marker.addListener('dragend', function(e){
                    $('#form-create input[name="location"]').val(`{"lat":${e.latLng.lat()},"lng":${e.latLng.lng()}}`);
                });
            }
        @endif
    }
    
</script>
@stop
