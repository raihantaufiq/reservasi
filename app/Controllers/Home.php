<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public $usermodel; 

    public function __construct() {
        $this->usermodel = new UserModel(); 
    }

    public function index() {
        if(session()->get('logged_in') == FALSE)
        {
            return redirect()->to('login/index');
        }else {
            $id_user = session()->get('id_user');
            $dataUser = $this->usermodel->getUser($id_user);

            $data = [
                'user' => $dataUser
            ];

            return view('home', $data);
        }
    }
}
