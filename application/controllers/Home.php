<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
	
	function __construct(){
        parent::__construct();
    }

	public function home(){
		
		if ( !file_exists('application/views/home.php') ) {
            show_404();
		}
		$this->load->model('Db_model');

		$data["skoly"] = $this->Db_model->get_skoly();
		$data["title"] = "Domů";
		$data["db"] = "";
		
		$this->load->view('header', $data);
		$this->load->view('home');
	}

	public function table(){

		if ( !file_exists('application/views/table.php') ) {
            show_404();
		}
		
		$data["title"] = "Tabulka škol";
		$data["table"] = "";
		
		$this->load->view('header', $data);
		$this->load->view('table');

	}

}