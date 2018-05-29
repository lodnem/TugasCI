<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class list_blog extends CI_Controller {

	public function index()
	{
		$this->load->model('artikel');

		$limit_per_page = 1;

		// URI segment untuk mendeteksi "halaman ke berapa" dari URL
		$start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;

		// Dapatkan jumlah data 
		$total_records = $this->artikel->get_total();
		
		if ($total_records > 0) {
			// Dapatkan data pada halaman yg dituju
			$data["artikel"] = $this->artikel->get_artikels($limit_per_page, $start_index);
			
			// Konfigurasi pagination
			$config['base_url'] = base_url() . 'list_blog/index';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;
			
			$this->pagination->initialize($config);
				
			// Buat link pagination
			$data["links"] = $this->pagination->create_links();
		}

		$this->load->view('blog_view', $data);
	}


	public function detail($id)
	{
		$this->load->model('artikel');
		$data['detail'] = $this->artikel->get_single($id);
		$this->load->view('blog_detail', $data);
	}

	public function add()
	{
		$this->load->model('Artikel');
		$this->load->model('category_model');
		
		$this->load->library('form_validation');
		$data['categories'] = $this->category_model->generate_cat_dropdown();

		$this->form_validation->set_rules('judul_blog','judul', 'required', array('required'=>'Isi %s , '));
		$this->form_validation->set_rules('tanggal_blog','tanggal nya', 'required', array('required'=>'jangan kosongi dong %s , '));
		$this->form_validation->set_rules('content','content', 'required', array('required'=>'Isi %s , '));
		$this->form_validation->set_rules('Email','e-mail', 'required', array('required'=>'Isi %s , '));
		$this->form_validation->set_rules('Pengarang','pengarang', 'required', array('required'=>'Isi %s , '));
		$this->form_validation->set_rules('Sumber','sumber', 'required', array('required'=>'Isi %s , '));

		if ($this->form_validation->run()==FALSE){
			$this->load->view('blog_create',$data);
		}
		else{


		if ($this->input->post('simpan')) {
			$upload = $this->Artikel->upload();

			if ($upload['result'] == 'success') {
				$this->Artikel->save($upload);
				redirect('list_blog');
			}else{
				$data['message'] = $upload['error'];
			}
		}

		$this->load->view('blog_create', $data);
	}
}

	public function edit($id){
		$this->load->model("Artikel");
		$this->load->model("category_model");
		$this->load->library('form_validation');
		$data['categories'] = $this->category_model->generate_cat_dropdown();
		$data['default'] = $this->Artikel->get_artikel_by_id($id);

		if(isset($_POST['edit'])){
			$this->Artikel->update($_POST, $id);
			redirect("list_blog");
		}

		$this->load->view("blog_edit",$data);
	}


	public function delete($id){
		$this->load->model("Artikel");
		$this->Artikel->hapus($id);
		redirect("list_blog");
	}
}