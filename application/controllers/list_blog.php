<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class list_blog extends CI_Controller {

	public function index()
	{
		$this->load->model('artikel');
		$data['artikel'] = $this->artikel->get_artikels();
		$this->load->view('home_view', $data);
	}

	public function detail($id)
	{
		$this->load->model('artikel');
		$data['detail'] = $this->artikel->get_single($id);
		$this->load->view('home_detail', $data);
	}

	public function add()
	{
		$this->load->model('Artikel');
		$data['tipe'] = "Add";

		if ($this->input->post('simpan')) {
			$upload = $this->Artikel->upload();

			if ($upload['result'] == 'success') {
				$this->Artikel->save($upload);
				redirect('list_blog');
			}else{
				$data['message'] = $upload['error'];
			}
		}

		$this->load->view('home_view_form', $data);
	}

	public function edit($id){
		$this->load->model("Artikel");
		$data['tipe'] = "Edit";
		$data['default'] = $this->Artikel->get_default($id);

		if(isset($_POST['simpan'])){
			$this->Artikel->update($_POST, $id);
			redirect("list_blog");
		}

		$this->load->view("home_view_form",$data);
	}


	public function delete($id){
		$this->load->model("Artikel");
		$this->Artikel->hapus($id);
		redirect("list_blog");
	}
}