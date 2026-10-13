<?php

namespace App\Http\Controllers;

use App\Superhero;
use Illuminate\Http\Request;

class SuperheroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $superheroes = Superhero::all();

        return view('superheroes.index', compact('superheroes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superheroes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'real_name' => 'required|string|max:255',
            'superhero_name' => 'required|string|max:255',
            'photo_url' => 'required|url|max:255',
            'additional_information' => 'required|string',
        ]);

        Superhero::create($validatedData);

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Superhero  $superhero
     * @return \Illuminate\Http\Response
     */
    public function show(Superhero $superhero)
    {
        return view('superheroes.show', compact('superhero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Superhero  $superhero
     * @return \Illuminate\Http\Response
     */
    public function edit(Superhero $superhero)
    {
        return view('superheroes.edit', compact('superhero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Superhero  $superhero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Superhero $superhero)
    {
        $validatedData = $request->validate([
            'real_name' => 'required|string|max:255',
            'superhero_name' => 'required|string|max:255',
            'photo_url' => 'required|url|max:255',
            'additional_information' => 'required|string',
        ]);

        $superhero->update($validatedData);

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Superhero  $superhero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Superhero $superhero)
    {
        $superhero->delete();

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe eliminado correctamente.');
    }
}
