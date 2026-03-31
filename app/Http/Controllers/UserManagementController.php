<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index(Request $request)
    {
        $query = UserModel::with('kelas');

        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('name', 'ilike', '%' . $request->search . '%')
                  ->orWhere('npm', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('filter_kelas') && $request->filter_kelas != '') {
            $query->where('kelas_id', $request->filter_kelas);
        }

        $users = $query->orderBy('name', 'asc')->paginate(5)->withQueryString();
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();

        return view('user-management', compact('users', 'kelas'));
    }

    public function create()
    {
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();
        return view('create-user', compact('kelas'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id'
        ]);

        $this->userModel->create([
            'name' => $request->input('name'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id')
        ]);

        return redirect()->route('user-management.index')->with('success', 'Mahasiswa baru berhasil ditambahkan! 🌿');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id'
        ]);

        $user = UserModel::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id')
        ]);

        return redirect()->route('user-management.index')->with('success', 'Data mahasiswa berhasil diperbarui! ✨');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->route('user-management.index')->with('success', 'Data mahasiswa telah dihapus! 🗑️');
    }
}