<?php

namespace App\Controllers;

use App\Models\TeknisiModel;

class LoginTeknisi extends BaseController
{
    public function index()
    {
        return view('Backend/Teknisi/login');
    }

    public function proses()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new TeknisiModel();
        $teknisi = $model->where('username', $username)->first();

        if ($teknisi && $teknisi['password'] === $password) {
            session()->set([
                'id_teknisi' => $teknisi['id'],
                'username'   => $teknisi['username'],
                'nama'       => $teknisi['nama_teknisi'],
                'role'       => 'teknisi',
                'logged_in'  => true
            ]);
            return redirect()->to('/teknisi');
        } else {
            return redirect()->back()->with('error', 'Username atau password salah.');
        }
    }

    public function logout()
    {
        session()->remove(['id_teknisi', 'username', 'nama', 'role', 'logged_in']);
        return redirect()->to('/teknisi/login');
    }
}
