<?php

namespace App\Http\Controllers;

use App\Models\about;
use Illuminate\Http\Request;

class aboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = about::all();
        return view('about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        about::create($request->all());
        return redirect()->route('about.create')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $about = about::findOrFail($id);
        return view('about.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $about = about::findOrFail($id);
        return view('about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);
        about::find($id)->update($request->all());
        return redirect()->route('about.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about = about::findOrFail($id);
        $about->delete();
        return redirect()->route('about.index')->with('success', 'Data Berhasil Dihapus');
    }
}
