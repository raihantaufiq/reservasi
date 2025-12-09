<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['id_user', 'password', 'nama'];
    
    public function getUser($id_user) {
        return $this->where(['id_user' => $id_user])->first();
    }

    // public function updateUser($id, $data) {
    //     return $this->update($id, $data);
    // }

    // public function deleteUser($id) {
    //     return $this->where('id', $id)->delete();
    // }

    // public function saveUser($data) {
    //     return $this->insert($data);
    // }
}

