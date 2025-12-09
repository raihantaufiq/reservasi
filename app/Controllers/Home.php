<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\JadwalModel;

class Home extends BaseController
{
    public $usermodel;
    public $jadwalmodel;

    public function __construct() {
        $this->usermodel = new UserModel();
        $this->jadwalmodel = new JadwalModel(); 
    }

    public function index() {
        if(session()->get('logged_in') == FALSE)
        {
            return redirect()->to('login/index');
        }else {
            $id_user = session()->get('id_user');
            $dataUser = $this->usermodel->getUser($id_user);
            $listJadwal = $this->jadwalmodel->getJadwal();
            array_multisort(array_column($listJadwal, 'tanggal'), SORT_ASC, $listJadwal);

            $data = [
                'user' => $dataUser,
                'listjadwal' => $listJadwal
            ];

            return view('home', $data);
        }
    }
}
