<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Type::all();
        $pokemon = Pokemon::all();
        return view('pokeCreate',compact('type','pokemon'));
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
            'nom' => 'required|unique:pokemon',
            'type_id' => 'required',
            'src' => 'required',
            'niveau' => 'required|min:1|max:100',
        ]);

        $pokemon = new Pokemon;
        $pokemon->nom=$request->nom;
        $pokemon->type_id=$request->type_id;
        $pokemon->src = $request->src;
        $pokemon->src = $request->file('src')->hashName();
        $request->file('src')->storePublicly('images','public');
        $pokemon->niveau=$request->niveau;
        $pokemon->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Pokemon::find($id);
        return view('pokeShow',compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Pokemon::find($id);
        $type = Type::all(); 
        return view('pokeEdit',compact('type','edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'src' => 'nullable',
        ]);

        $pokemon = Pokemon::find($id);
        $pokemon->nom=$request->nom;
        $pokemon->type_id=$request->type_id;
        $pokemon->src = $request->src;
        Storage::disk('public')->delete('/images/'.$pokemon->src);
        $pokemon->src = $request->file('src')->hashName();
        $request->file('src')->storePublicly('images','public');
        $pokemon->niveau=$request->niveau;
        $pokemon->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Pokemon::find($id);
        Storage::disk('public')->delete('images/'.$delete->src);
        $delete->delete();
        return redirect('/');
    }
}
