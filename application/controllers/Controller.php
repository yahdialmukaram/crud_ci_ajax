<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model','model');
        
    }
    
    public function index()
    {
      $this->load->view('admin/header');
      $this->load->view('admin/dashboard');
      $this->load->view('admin/footer');
         
    }
    public function getData(Type $var = null)
    {
        $data = $this->model->getData('siswa');
        echo json_encode($data);
        // print_r($data);   
    }

    public function tambah_data(Type $var = null)
    {
        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $telepon = $this->input->post('telepon');
        $alamat = $this->input->post('alamat');

        if ($nis=='') {
            $result['pesan']='nis harus di isi';
        }elseif($nama==''){
            $result['pesan']='nama harus di isi';
        }elseif ($jenis_kelamin=='') {
            $result['pesan']='jenis_kelamin harus di isi';
        }elseif ($telepon=='') {
            $result['pesan']='telepon harus di isi';
        }elseif ($alamat=='') {
            $result['pesan']='alamat harus di isi';
        }else {
            $result['pesan']='';

            $data =[
                'nis' =>$nis,
                'nama' =>$nama,
                'jenis_kelamin' =>$jenis_kelamin,
                'telepon' =>$telepon,
                'alamat' =>$alamat,
            ];
            $data = $this->model->tambah_data($data);
            echo json_encode($result);
        }
        
    }
    public function edit_data(Type $var = null)
    {
        $id_siswa = $this->input->post('id_siswa');
        $data = $this->model->edit_data($id_siswa);
        echo json_encode($data);
     }

     public function update_data(Type $var = null)
     {
        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $telepon = $this->input->post('telepon');
        $alamat = $this->input->post('alamat');
        $data =[
            'nis' =>$nis,
            'nama' =>$nama,
            'jenis_kelamin' =>$jenis_kelamin,
            'telepon' =>$telepon,
            'alamat' =>$alamat,
        ];
        $data = $this->model->update_data($id_siswa,$data);
        echo json_encode($data);
     }

}

?>