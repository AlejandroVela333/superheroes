@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Detalle del superhéroe</div>
        <div class="card-body">
            <div class="text-center mb-4">
                <img src="{{ $superhero->photo_url }}"
                     alt="Fotografía de {{ $superhero->superhero_name }}"
                     class="img-fluid rounded"
                     style="max-height: 400px;">
            </div>
            <div class="form-group">
                <label>Nombre real:</label>
                <input type="text" class="form-control" value="{{ $superhero->real_name }}" disabled>
            </div>
            <div class="form-group">
                <label>Nombre de superhéroe:</label>
                <input type="text" class="form-control" value="{{ $superhero->superhero_name }}" disabled>
            </div>
            <div class="form-group">
                <label>URL de la fotografía:</label>
                <input type="url" class="form-control" value="{{ $superhero->photo_url }}" disabled>
            </div>
            <div class="form-group">
                <label>Información adicional:</label>
                <textarea rows="5" class="form-control" disabled>{{ $superhero->additional_information }}</textarea>
            </div>
            <a href="{{ route('superheroes.edit', $superhero->id) }}" class="btn btn-primary">Editar</a>
            <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">Regresar al listado</a>
        </div>
    </div>
@endsection
