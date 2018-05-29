<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatables extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('artikel');
	}

	public function index()
	{
		// Dapatkan data artikel dari model
		$artikel['data'] = $this->artikel->get_artikels();

		$this->load->view("templates/header");
		$this->load->view('datatables/dt_view', $artikel);
		$this->load->view("templates/footer");
	}

}
