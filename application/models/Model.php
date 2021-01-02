<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

    public function getData()
    {
     $this->db->from('siswa');   // memanggi dari tabel siswa
     $this->db->order_by('id_siswa', 'desc');  //me urutkan 
     return $this->db->get()->result();
        
    }
    public function tambah_data($data)
    {
        $this->db->insert('siswa', $data);
        
    }
    public function edit_data($id_siswa)
    {
        $this->db->where('id_siswa', $id_siswa);  //mencari id siswa
        return $this->db->get('siswa')->result();   //menampilkan tb ssiswa
    }

    public function update_data($id_siswa,$data)
    {
        $this->db->where('id_siswa', $id_siswa);
        $this->db->update('siswa', $data);
        
    }

}


?>