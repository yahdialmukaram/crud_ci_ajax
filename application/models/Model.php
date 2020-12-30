<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

    public function getData()
    {
     return $this->db->get('siswa')->result();
        
    }

}


?>