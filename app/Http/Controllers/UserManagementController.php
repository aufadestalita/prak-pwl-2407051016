<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
                $q->where('name', 'like', '%' . $request->search . '%')
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
        try {
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

            Log::info('User created successfully');
            return redirect()->route('user-management.index')->with('success', 'User berhasil dibuat');
        } catch (Exception $e) {
            Log::error('User creation failed: ' . $e->getMessage());
            return redirect()->route('user-management.index')->with('error', 'User gagal dibuat');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'npm' => 'required|string|max:255',
                'kelas_id' => 'required|exists:kelas,id'
            ]);

            DB::transaction(function() use ($id, $request) {
                $user = UserModel::findOrFail($id);
                $user->update([
                    'name' => $request->input('name'),
                    'npm' => $request->input('npm'),
                    'kelas_id' => $request->input('kelas_id')
                ]);
            });

            Log::info('User updated successfully for ID: ' . $id);
            return redirect()->route('user-management.index')->with('success', 'User berhasil diupdate');

        } catch (Exception $e) {
            Log::error('User update failed: ' . $e->getMessage());
            return redirect()->route('user-management.index')->with('error', 'User gagal diupdate');
        }
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function() use ($id) {
                $user = UserModel::findOrFail($id);
                $user->delete();
            });

            Log::info('User deleted successfully: ' . $id);
            return redirect()->route('user-management.index')->with('success', 'User berhasil dihapus');

        } catch (Exception $e) {
            Log::error('User deletion failed: ' . $e->getMessage());
            return redirect()->route('user-management.index')->with('error', 'Gagal menghapus user');
        }
    }
}