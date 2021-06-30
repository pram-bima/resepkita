<?php

namespace App\Http\Controllers;

use App\Resep;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resep = Resep::all();
        return view('index', compact('resep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required', 
            'gambar' => 'required', 
            'bahan' => 'required',
            'alat' => 'required', 
            'langkah' => 'required',
        ]);

        Resep::create($request->all());

        return redirect()->route('resep.index')
            ->with('success', 'Resep created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function show(Resep $resep)
    {
        return view('detail', compact('resep'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function edit(Resep $resep)
    {
        return view('edit', compact('resep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resep $resep)
    {
        $request->validate([
            'judul' => 'required', 
            'gambar' => 'required', 
            'bahan' => 'required',
            'alat' => 'required', 
            'langkah' => 'required',
        ]);

        $resep->update($request->all());

        return redirect()->route('resep.index')
            ->with('success', 'Resep updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resep $resep)
    {
        $resep->delete();

        return redirect()->route('resep.index')
            ->with('success', 'Resep deleted successfully');
    }
}
