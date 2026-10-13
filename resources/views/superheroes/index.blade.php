@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Superhéroes</h1>
        <a class="btn btn-primary" href="{{ route('superheroes.create') }}">Registrar superhéroe</a>
    </div>

    @if (session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Fotografía</th>
                <th>Nombre real</th>
                <th>Nombre de superhéroe</th>
                <th colspan="3">Operaciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($superheroes as $superhero)
                <tr>
                    <td>{{ $superhero->id }}</td>
                    <td>
                        <img src="{{ $superhero->photo_url }}"
                             alt="Fotografía de {{ $superhero->superhero_name }}"
                             width="80" height="80"
                             style="object-fit: cover;">
                    </td>
                    <td>{{ $superhero->real_name }}</td>
                    <td>{{ $superhero->superhero_name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('superheroes.show', $superhero->id) }}">Ver</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('superheroes.edit', $superhero->id) }}">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('superheroes.destroy', $superhero->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hay superhéroes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
