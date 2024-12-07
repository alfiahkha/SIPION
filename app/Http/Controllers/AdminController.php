<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    // Menampilkan daftar admin dengan pagination
    public function index()
    {
        $admins = Admin::paginate(10);
        return view('admin.index', compact('admins'));
    }

    // Menampilkan detail admin
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.show', compact('admin'));
    }

    // Menampilkan form untuk membuat admin baru
    public function create()
    {
        $users = User::all(); 
        return view('admin.create', compact('users'));
    }

    // Menyimpan admin baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email', // Pastikan email unik di tabel users
            'nomor_telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'tanggal_bergabung' => 'required|date',
        ]);
        
        // Buat user baru di tabel users
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt('password123'), // Password default
        ]);

        // Simpan data admin ke tabel admin
        Admin::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
            'tanggal_bergabung' => $request->tanggal_bergabung,
            'id_user' => $user->id, // Gunakan ID user yang baru saja dibuat
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit admin
    public function edit($id_admin)
    {
        $admin = Admin::findOrFail($id_admin);
        $users = User::all(); // Dapatkan semua user
        return view('admin.edit', compact('admin', 'users'));
    }

    // Memperbarui data admin
    public function update(Request $request, $id_admin)
    {
        $admin = Admin::findOrFail($id_admin);

        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id_admin . ',id_user', // Pastikan email unik di tabel users
            'nomor_telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'tanggal_bergabung' => 'required|date',
            'id_user' => 'required|exists:users,id', // Pastikan id_user valid
        ]);

        // Update data admin
        $admin->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
            'tanggal_bergabung' => $request->tanggal_bergabung,
            'id_user' => $request->id_user,
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil diperbarui.');
    }

    // Menghapus admin dari database
    public function delete($id)
    {
        try {
            $admin = Admin::findOrFail($id);
            $admin->delete();
            return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.index')->with('error', 'Terjadi kesalahan saat menghapus admin: ' . $e->getMessage());
        }
    }
}
