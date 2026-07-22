<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
    {
        public function index()
        {
            $users = User::select(
                'id',
                'nama',
                'email',
                'role',
                'created_at'
            )->get();

            return response()->json([
                'success' => true,
                'message' => 'Data user berhasil diambil.',
                'data' => $users
            ]);
        }
        
        public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:admin,user,ketua_lppm,ketua_stt',
        ]);

        $user = User::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Akun berhasil ditambahkan.',
            'data' => $user,
        ], 201);
    }

    public function show($id)
    {
        $user = User::select(
            'id',
            'nama',
            'email',
            'role',
            'created_at'
        )->find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data user berhasil diambil.',
            'data' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan.'
            ], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:admin,user,ketua_lppm,ketua_stt',
        ]);

        $user->update([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'role' => $validated['role'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data user berhasil diperbarui.',
            'data' => $user
        ]);
    }

        public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan.'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User berhasil dihapus.'
        ]);
    }
}