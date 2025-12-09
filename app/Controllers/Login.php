<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public $usermodel; 

    public function __construct() {
        $this->usermodel = new UserModel(); 
    }

    public function index()
    {
        if(session()->get('logged_in') == TRUE)
        {
            return redirect()->to(base_url());
        }else {
            return view('form_login');
        }
    }

    public function process()
    {
        $id_user = $this->request->getVar('id_user');
        $password = $this->request->getVar('password');
        $dataUser = $this->usermodel->getUser($id_user);
        // dd($dataUser);
        if ($dataUser) {
            // var_dump($password, $dataUser['password']);
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'id_user' => $dataUser['id_user'],
                    'name' => $dataUser['nama'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url());
            } else {
                session()->setFlashdata('error', 'IDuser atau Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'IDuser atau Password Salah');
            return redirect()->back();
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }
}
