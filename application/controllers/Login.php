<?php 	
class Login extends CI_Controller{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('M_login');
	}
	public function index(){
		$this->load->view('login');
	}
	public function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array (
			'username' => $username,
			'$password' => md5 ($password));
		$cek = $this->M_login->cek_login("admin",$where)->num_rows();
		if($cek > 0){
			$data_session = array (
				'nama' => $username, 
				'status' => "login" );
			$this->session->set_userdata($data_session);
			redirect(base_url("admin"));
		}else{
			echo "username dan password salah";
		}
		}
		public function tes()
		{
			
		}
		public function logout(){
			$this->session->session_destroy();
			redirect(base_url('login'));
		}
		public function register()
		{
			$this->load->view('register');
		}

	}