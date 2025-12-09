<?php namespace App\Models;

use CodeIgniter\Model;

class RuangModel extends Model
{
    protected $table = 'ruang';
    protected $allowedFields = ['no_ruang', 'nama_ruang'];

    public function getRuang($no_ruang) {
        return $this->where(['no_ruang' => $no_ruang])->first();
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

