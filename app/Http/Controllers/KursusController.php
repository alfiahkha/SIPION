<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kursus = Kursus::all(); // Ambil semua data kursus
        return view('kursus.index', compact('kursus')); // Kirim data ke view index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kursus.create'); // Tampilkan form untuk membuat kursus baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kursus' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'durasi' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        Kursus::create($request->all()); // Simpan data kursus baru
        return redirect()->route('kursus.index')->with('success', 'Kursus berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kursus = Kursus::findOrFail($id); // Cari kursus berdasarkan ID
        return view('kursus.show', compact('kursus')); // Tampilkan detail kursus
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kursus = Kursus::findOrFail($id); // Cari kursus berdasarkan ID
        return view('kursus.edit', compact('kursus')); // Tampilkan form edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kursus' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'durasi' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        $kursus = Kursus::findOrFail($id); // Cari kursus berdasarkan ID
        $kursus->update($request->all()); // Update data kursus
        return redirect()->route('kursus.index')->with('success', 'Kursus berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $kursus = Kursus::findOrFail($id); // Cari kursus berdasarkan ID
        $kursus->delete(); // Hapus kursus
        return redirect()->route('kursus.index')->with('success', 'Kursus berhasil dihapus.');
    }
}
