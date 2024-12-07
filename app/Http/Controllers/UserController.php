<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
       // Paginate the users with 10 entries per page (adjust as needed)
    $users = User::paginate(10);

    // Return view with paginated users data
    return view('users.index', compact('users'));
    }
    
    

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
    
        // Simpan user ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Find user by ID or throw 404 error
        return view('users.edit', compact('user')); // Pass the user data to the view
    }
    


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8', // Optional if user doesn't want to change password
        ]);

        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;

        // If a new password is provided, hash and update it
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Save the updated user data
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }


    public function delete(Request $request, $id)
    {
        try {
            $data = User::find($id);

            if ($data) {
                $data->delete();
                return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
            } else {
                return redirect()->route('users.index')->with('error', 'User tidak ditemukan.');
            }
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Terjadi kesalahan saat menghapus user: ' . $e->getMessage());
        }
    }

}
