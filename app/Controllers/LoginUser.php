<?php

namespace App\Controllers;

use App\Models\M_User;

class LoginUser extends BaseController
{
    public function index()
    {
        return view('Backend/Login/loginuser');
    }

    public function register()
    {
        return view('Backend/Login/register');
    }

    public function prosesLogin()
    {
        $session = session();
        $model = new M_User();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = $model->where('username', $username)->first();

        if ($data) {
            $pass = $data['password'];
            if (password_verify($password, $pass)) {
                $sessionData = [
                    'id_user'   => $data['id_user'],
                    'username'  => $data['username'],
                    'nama_user' => $data['nama_user'],
                    'alamat'    => $data['alamat'],      // Tambahkan alamat
                    'no_telp'   => $data['no_telp'],     // Tambahkan no_telp
                    'logged_in' => TRUE
                ];
                $session->set($sessionData);
                return redirect()->to('/user'); // ganti sesuai route dashboard user
            } else {
                return redirect()->back()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan.');
        }
    }

    public function simpanRegister()
    {
        $model = new M_User();

        $username = $this->request->getPost('username');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $nama_user = $this->request->getPost('nama_user');
        $alamat = $this->request->getPost('alamat');
        $no_telp = $this->request->getPost('no_telp');

        $model->save([
            'username' => $username,
            'password' => $password,
            'nama_user' => $nama_user,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function logout()
{
    session()->remove(['id_user', 'username', 'nama_user', 'logged_in', 'alamat', 'no_telp']);
    return redirect()->to('/login');
}

public function updateProfile()
{
    $session = session();
    $model = new M_User();
    $id_user = $session->get('id_user');

    $alamat = $this->request->getPost('alamat');
    $no_telp = $this->request->getPost('no_telp');

    $model->update($id_user, [
        'alamat' => $alamat,
        'no_telp' => $no_telp,
    ]);

    // Update session data
    $session->set('alamat', $alamat);
    $session->set('no_telp', $no_telp);

    return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
}

}
