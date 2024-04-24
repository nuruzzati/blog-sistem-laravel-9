<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index() {
        return view('dashboard.profil.index', [
            'user' =>  Auth::user()
        ]);
    }


    public function edit() {
          $user = Auth::user();
        return view('dashboard.profil.edit', [
            'user' => $user
        ]);
    }

      public function update(Request $request)
    {
        // Validasi data yang dikirimkan dari formulir
        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username,' . Auth::id(),
            'email' => 'required|email:dns|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:6',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024', // maksimum 1MB
        ]);

        // Ambil pengguna yang sedang login
        $user = User::find(Auth::id());

        // Perbarui nama dan email pengguna
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;

        // Periksa apakah pengguna ingin mengubah password
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Periksa apakah pengguna mengunggah gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari penyimpanan
            if ($user->image) {
                Storage::delete($user->image);
            }

            // Simpan gambar baru ke penyimpanan
            $user->image = $request->file('image')->store('user-images');
        }

        // Simpan perubahan ke database
        $user->save();

        return redirect('/dashboard/profil')->with('success', 'Profil Anda telah diperbarui!');
    }






}
