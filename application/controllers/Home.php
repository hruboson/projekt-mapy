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

	public function add_school(){

		if (!file_exists('application/views/add_school.php')) {
			show_404();
		}

		$this->load->model('Db_model');

		$data["title"] = "Přidat školu";
		$data["mesta"] = $this->Db_model->get_mesta();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');

		$this->form_validation->set_rules('nazev', 'Název', 'required');
		$this->form_validation->set_rules('mesto', 'Město', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('header', $data);
			$this->load->view('add_school');
		} else {
			$nazev = $this->input->post('nazev');
			$geo_lat = $this->input->post('geo_lat');
			$geo_long = $this->input->post('geo_long');
			$mesto = $this->input->post('mesto');

			$this->Db_model->add_skola($nazev, $geo_lat, $geo_long, $mesto);
			$this->session->set_flashdata('success', 'Škola byla úspěšně přidána');

			$this->load->view('header', $data);
			$this->load->view('add_school');
		}

	}

}