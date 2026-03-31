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

    public function index()
    {
        
        $users = $this->userModel->getUser();

       
        return view('user-management', compact('users'));
    }

    public function create()
    {
        $kelas = $this->kelasModel->getKelas();
        
        $data = [
            'judul' => 'Tambah User',
            'kelas' => $kelas
        ];

        
        return view('user-management-create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required',
            'npm'      => 'required',
            'kelas_id' => 'required',
        ]);

        $this->userModel->create([
            'nama'     => $request->input('nama'),
            'npm'      => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id')
        ]);

        return redirect()->route('user-management.index');
    }

    public function viewData($nama = " ", $npm = " ", $jurusan = " ", $prodi = " ")
    {
        return view('detail-user', compact('nama', 'npm', 'jurusan', 'prodi'));
    }
}