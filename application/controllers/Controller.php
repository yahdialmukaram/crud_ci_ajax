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
        $data = $this->model->getData();
        echo json_encode($data);
        // print_r($data);   
    }

}

?>