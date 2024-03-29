<?php

namespace App\Controllers;

use App\Models\ModelLogin;

class Login extends BaseController
{
    private $ModelLogin;

    public function __construct()
    {
        $this->ModelLogin = new ModelLogin();
    }

    public function index()
    {
        // session();
        $data = [
            'judul' => 'Login',
            'validation' => \Config\Services::validation(),
        ];

        return view('v_login', $data);
    }

    // public function CekLogin()
    // {
    //     if ($this->validate([
    //         'email' => [
    //             'label' => 'E-Mail',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Belum Diisi !',

    //             ]
    //         ],
    //         'password' => [
    //             'label' => 'Password',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Belum Diisi !',
    //             ]
    //         ]
    //     ])) {
    //         $email = $this->request->getPost('email');
    //         $password = $this->request->getPost('password');
    //         $CekLogin = $this->ModelLogin->CekUser($email, $password);

    //         if ($CekLogin) {

    //             session()->set('nama_user', $CekLogin['nama_user']);
    //             session()->set('level', $CekLogin['level']);
    //             return redirect()->to(base_url('Admin'));
    //         } else {
    //             session()->setFlashdata('gagal', 'Email Atau Password Salah !!!');
    //             return redirect()->to(base_url('Login'));
    //         }
    //     } else {
    //         session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
    //         return redirect()->to(base_url('Login'))->withInput('validation', \Config\Services::validation());
    //     }
    // }

    public function CekLogin()
    {
        $post = $this->request->getPost();
        $user = $this->ModelLogin->where('email', $post['email'])->first();
        if ($user) {
            // dd($user);
            if ($post['email'] == $user['email']) {
                if (password_verify($post['password'], $user['password'])) {
                    $level = $user['level'];
                    session()->set('level', $level);
                    switch ($level) {
                        case 1:
                            // dd($level);

                            return redirect()->to('Admin');
                            break;
                        case 2:
                            // dd($level);

                            return redirect()->to('Bendahara', $level);
                            break;
                    }
                } else {
                    return redirect()->back()->with('error', 'Password salah!');
                }
            } else {
                return redirect()->back()->with('error', 'Email salah!');
            }
        }
    }

    public function LogOut()
    {
        session()->remove('nama_user');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Anda Berhasil Logout !!!');

        return redirect()->to(base_url('Login'));
    }
}
