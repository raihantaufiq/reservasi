<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RuangModel;
use App\Models\JadwalModel;

class Register extends BaseController
{
    public $usermodel;
    public $ruangmodel;
    public $jadwalmodel; 

    public function __construct() {
        $this->usermodel = new UserModel();
        $this->ruangmodel = new RuangModel();
        $this->jadwalmodel = new JadwalModel(); 
    }

    public function index()
    {
        return view('form_register');
    }

    public function process()
    {
        if (!$this->validate([
            'no_ruang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'waktu_mulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'waktu_selesai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    
        $this->jadwalmodel->save([
            'id_user' => session()->get('id_user'),
            'no_ruang' => $this->request->getVar('no_ruang'),
            'tanggal' => $this->request->getVar('tanggal'),
            'waktu_mulai' => $this->request->getVar('waktu_mulai'),
            'waktu_selesai' => $this->request->getVar('waktu_selesai')
        ]);
        
        

        return redirect()->to('/login/index');
    }
}