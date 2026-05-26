<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::with('prodi')->get();

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = Prodi::all();

        return view('mahasiswa.create', compact('prodis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'npm' => 'required|unique:mahasiswas,npm',
            'nama' => 'required',
            'foto' => 'nullable|image|max:2048',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        //uplod foto jika ada
        if ($request->hasFile('foto')) {
            //rename file dengan npm untuk menghindari duplikat nama file
            $filename = $input['npm']. '.' . $request->file('foto')->getClientOriginalExtension();
            $input['foto'] = $request->file('foto')->storeAs('fotos', $filename, 'public');
        }else {
            $input['foto'] = null; //set foto null jika tidak ada file yang diupload
        }

        Mahasiswa::create($input);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $prodis = Prodi::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $input = $request->validate([
            'npm' => 'required|unique:mahasiswas,npm,'.$mahasiswa->id,
            'nama' => 'required',
            'foto' => 'nullable|image|max:2048',
            'prodi_id' => 'required|exists:prodis,id',
        ]);
        if ($request->hasFile('foto')) {
            $filename = $input['npm']. '.' . $request->file('foto')->getClientOriginalExtension();
            $input['foto'] = $request->file('foto')->storeAs('fotos', $filename, 'public');
        }else {
            $input['foto'] = $mahasiswa->foto; //jika tidak ada file baru, tetap gunakan foto lama
        }

        $mahasiswa->update($input);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
