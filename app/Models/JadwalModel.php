<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
  protected $table = 'jadwal';
  protected $primaryKey = 'id_jadwal';
  protected $allowedFields = ['id_user', 'no_ruang', 'waktu_mulai', 'waktu_selesai'];

  public function getJadwal($id_jadwal = false)
  {
    if ($id_jadwal == false) {
      return $this->findAll();
    }

    return $this->where(['id_jadwal' => $id_jadwal])->first();
  }

  public function deleteJadwal($id_jadwal)
  {
    return $this->where('id_jadwal', $id_jadwal)->delete();
  }

  public function saveJadwal($data)
  {
    return $this->insert($data);
  }
}
