<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa; // Assuming you have a Siswa model

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        // Paginate the students with 10 entries per page (adjust as needed)
        $siswa = Siswa::paginate(10);

        // Return view with paginated students data
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        $users = User::all(); 

        // Kirim data users ke view 'admin.create'
        return view('siswa.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'email' => 'required|string|email|max:25|unique:siswa',
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'nullable|string',
            // Include other validations as necessary
        ]);

        // Save student to database
        Siswa::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            // Add other fields as necessary
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $student = Siswa::findOrFail($id); // Find student by ID or throw 404 error
        return view('siswa.edit', compact('siswa')); // Pass the student data to the view
    }

    public function update(Request $request, $id)
    {
        $student = Siswa::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'nama' => 'required|string|max:50',
            'email' => 'required|string|email|max:25|unique:siswa,email,' . $student->id,
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'nullable|string',
            // Include other validations as necessary
        ]);

        // Update student details
        $student->nama = $request->nama;
        $student->email = $request->email;
        $student->nomor_telepon = $request->nomor_telepon;
        $student->tanggal_lahir = $request->tanggal_lahir;
        $student->alamat = $request->alamat;

        // Save the updated student data
        $student->save();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    public function delete(Request $request, $id)
    {
        try {
            $data = Siswa::find($id);

            if ($data) {
                $data->delete();
                return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
            } else {
                return redirect()->route('siswa.index')->with('error', 'Siswa tidak ditemukan.');
            }
        } catch (\Exception $e) {
            return redirect()->route('students.index')->with('error', 'Terjadi kesalahan saat menghapus siswa: ' . $e->getMessage());
        }
    }
}
