<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Pelatih;

class PelatihController extends Controller
{
    public function index()
    {
        $pelatih = Pelatih::paginate(10);
        return view('pelatih.index', compact('pelatih'));
    }

    public function create()
    {
        $users = User::all();
        return view('pelatih.create', compact('users'));
    }
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:50',
            'email' => 'required|string|email|max:25|unique:pelatih|unique:users,email', // Pastikan email juga unik di tabel users
            'nomor_telpon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'keahlian' => 'required|string|max:100',
            'pengalaman' => 'nullable|string',
            'tanggal_bergabung' => 'required|date',
        ]);
    
        // Tambahkan data pelatih ke tabel users terlebih dahulu
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt('password123'), // Default password
        ]);
    
        // Tambahkan data pelatih ke tabel pelatih
        Pelatih::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_telpon' => $request->nomor_telpon,
            'alamat' => $request->alamat,
            'keahlian' => $request->keahlian,
            'pengalaman' => $request->pengalaman,
            'tanggal_bergabung' => $request->tanggal_bergabung,
            'id_user' => $user->id, // Gunakan ID user yang baru saja dibuat
        ]);
    
        return redirect()->route('pelatih.index')->with('success', 'Pelatih berhasil ditambahkan dan data user berhasil disinkronkan.');
    }
    
    
    public function show(string $id_pelatih)
    {
        $pelatih = Pelatih::findOrFail($id_pelatih);
        return view('pelatih.show', compact('pelatih'));
    }

    public function edit(string $id_pelatih)
    {
        $pelatih = Pelatih::findOrFail($id_pelatih);
        $users = User::all();
        return view('pelatih.edit', compact('pelatih', 'users'));
    }

    public function update(Request $request, string $id_pelatih)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'email' => 'required|string|email|max:25|unique:pelatih,email,' . $id_pelatih . ',id_pelatih',
            'nomor_telpon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'keahlian' => 'required|string|max:100',
            'pengalaman' => 'nullable|string',
            'tanggal_bergabung' => 'required|date',
            'id_user' => 'required|integer',
        ]);

        $pelatih = Pelatih::findOrFail($id_pelatih);
        $pelatih->update($request->all());
        return redirect()->route('pelatih.index')->with('success', 'Pelatih berhasil diperbarui.');
    }

    public function delete(string $id_pelatih)
    {
        $pelatih = Pelatih::findOrFail($id_pelatih);
        $pelatih->delete();
        return redirect()->route('pelatih.index')->with('success', 'Pelatih berhasil dihapus.');
    }
}