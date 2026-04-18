<?php

namespace App\Controllers;

use App\Models\AdminModel;

class LoginAdmin extends BaseController
{
    public function index()
    {
        return view('Backend/Admin/login');
    }

    public function auth()
    {
        $username = $this->request->getPost('username_admin');
        $password = $this->request->getPost('password');

        $adminModel = new \App\Models\AdminModel();
        $admin = $adminModel->where('username_admin', $username)->first();

        if ($admin) {
            // Gunakan password_verify untuk membandingkan password
            if (password_verify($password, $admin['password'])) {
                // Login sukses, set session, redirect, dll
                session()->set([
                    'id_admin'   => $admin['id_admin'],
                    'username'   => $admin['username_admin'],
                    'namaadmin'       => $admin['nama_admin'],
                    'role'       => 'admin',
                    'logged_in_admin' => true
                ]);
                return redirect()->to('/admin');
            } else {
                // Password salah
                return redirect()->back()->with('error', 'Password salah.');
            }
        } else {
            // Username tidak ditemukan
            return redirect()->back()->with('error', 'Username tidak ditemukan.');
        }
    }

    public function logout()
    {
        session()->remove(['id_admin', 'username', 'nama', 'role', 'logged_in_admin']);
        return redirect()->to('/loginadmin');
    }
}
