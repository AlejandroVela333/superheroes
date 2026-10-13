@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Editar superhéroe</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('superheroes.update', $superhero->id) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="real_name">Nombre real:</label>
                    <input id="real_name" type="text" class="form-control" name="real_name" value="{{ old('real_name', $superhero->real_name) }}" required>
                </div>
                <div class="form-group">
                    <label for="superhero_name">Nombre de superhéroe:</label>
                    <input id="superhero_name" type="text" class="form-control" name="superhero_name" value="{{ old('superhero_name', $superhero->superhero_name) }}" required>
                </div>
                <div class="form-group">
                    <label for="photo_url">URL de la fotografía:</label>
                    <input id="photo_url" type="url" class="form-control" name="photo_url" value="{{ old('photo_url', $superhero->photo_url) }}" required>
                </div>
                <div class="form-group">
                    <label for="additional_information">Información adicional:</label>
                    <textarea id="additional_information" rows="5" class="form-control" name="additional_information" required>{{ old('additional_information', $superhero->additional_information) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">Regresar</a>
            </form>
        </div>
    </div>
@endsection
