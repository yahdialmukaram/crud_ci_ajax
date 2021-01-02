<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

    public function getData()
    {
     return $this->db->get('siswa')->result();
        
    }
    public function tambah_data($data)
    {
        $this->db->insert('siswa', $data);
        
    }
    public function tampil_id_siswa($id_siswa)
    {
        $this->db->where('id_siswa', $id_siswa);  //mencari id siswa
        return $this->db->get('siswa')->result();   //menampilkan tb ssiswa
    }

}


?>