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
        $data = [
            'nama' => "Raditya",
            'foto' => 'avatar.png',
        ];

        $mahasiswa = Mahasiswa::with('prodi')->get();
        return view('mahasiswa.index', compact('data', 'mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'nama' => "Raditya",
            'foto' => 'avatar.png',
        ];
        $prodi = Prodi::all();
        return view('mahasiswa.create', compact('data', 'prodi'));
    }
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // 1. Validasi input
            $validated = $request->validate([
                'NIM' => 'required|unique:mahasiswa,NIM|max:30',
                'Nama' => 'required|string|max:100',
                'Tanggal_lahir' => 'required|date',
                'Telp' => 'required|string|max:50',
                'Email' => 'required|email|max:150',
                'Password' => 'required|string|max:255',
                'Foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'Id' => 'required|exists:prodi,Id', // Tambahkan validasi untuk prodi
            ]);

            // 2. Upload foto
            if ($request->hasFile('Foto')) {
                $foto = $request->file('Foto');
                $fotoName = time() . '_' . $foto->getClientOriginalName();
                $foto->move(public_path('uploads/foto_mahasiswa'), $fotoName);
            }

            // 3. Simpan data
            $mahasiswa = new Mahasiswa();
            $mahasiswa->NIM = $validated['NIM'];
            $mahasiswa->Nama = $validated['Nama'];
            $mahasiswa->Tanggal_lahir = $validated['Tanggal_lahir'];
            $mahasiswa->Telp = $validated['Telp'];
            $mahasiswa->Email = $validated['Email'];
            $mahasiswa->Password = bcrypt($validated['Password']); // Enkripsi password
            $mahasiswa->Foto = $fotoName;
            $mahasiswa->Id = $validated['Id']; // Tambahkan ID prodi
            $mahasiswa->save();

            return redirect()->route('mahasiswa.index')
                ->with('success', 'Data mahasiswa berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
