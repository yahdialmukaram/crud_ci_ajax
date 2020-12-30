<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Siswa extends CI_Controller//disini salah pengtikan , yang betul itu CI_Controller dan untuk nama clas biasakan  menggunakan huruf besar, walaupun menggunakan huruf kecil tidak masalah, tapi di utamakan huruf besa, contoh "class Siswa extends CI_Controller"
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('SiswaModel'); // disini tanda ; tinggal 
		// load siswamodal ke kontroller ini
	}
	public function index()
	{ // disini tulisan funtion salah , yang betul function
		$data['siswa'] = $this->SiswaModel->view();
		$this->load->view('siswa/index',$data);
	}
function test()
{
	$this->load->view('siswa/index2');//
}

public function tambah()//kal
{
	if ($this->input->post('submit')) {  //jika usermeng klik tumol sumbit yang ad di form

		if ($this->SiswaModel->validation("save")) { //jika validasi sukses atau hasil validasi true
			$this->SiswaModel->save(); // panggil fungsi save yang ada di siswamodel.php
			redirect('siswa');
		}
	}
	$this->load->view('siswa/form_tambah');// seharusnya siswa/form_tambah
}

public function ubah($nis)
{
	if ($this->input->post('submit')) { //  jika user meng klk tmbol sumbut yang ada d form

		if ($this->SiswaModel->validation("update")) { //jika validasi sukses makak true
			$this->SiswaModel->edit($nis); // panggil fungsi edit yang ada di siswamodel.php
			redirect('siswa');
		}
	}
	$data['siswa'] = $this->SiswaModel->view_by($nis);
	$this->load->view('siswa/form_ubah', $data); //disini tertinggal tanda ;
}

public function hapus($nis){
	$this->SiswaModel->delete($nis); //panggil fungsi delete yang ada di siswamodel.php
	redirect('siswa');
}
}
