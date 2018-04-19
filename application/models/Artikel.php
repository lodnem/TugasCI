<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Model {	

	public function get_artikels(){
		$query = $this->db->get('nama');
		return $query->result();
	}	

	public function get_single($id)
	{
		$query = $this->db->query('select * from nama where id_blog='.$id);
		return $query->result();
	}

	public function get_default($id)
	{
		$data = array();
  		$options = array('id_blog' => $id);
  		$Q = $this->db->get_where('nama',$options,1);
    		if ($Q->num_rows() > 0){
      			$data = $Q->row_array();
   			}
  		$Q->free_result();
 		return $data;
	}

	public function upload(){
		$config['upload_path'] = './img/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '2048';
		$config['remove_space'] = TRUE;
	
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('gambar_blog')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function insert($upload)
		{
			$data = array(
				'id_blog' => '',
				'judul_blog' => $this->input->post('input_judul'),
				'tanggal_blog' => $this->input->post('input_tanggal'),
				'content' => $this->input->post('input_content'),
				'Email' => $this->input->post('input_pengarang'),
				'Pengarang' => $this->input->post('input_email'),
				'Sumber'  => $this->input->post('input_jenis'),
				'gambar_blog' => $upload['file']['file_name']
				
				
			);

			$this->db->insert('blog', $data);
		}
	
	// Fungsi untuk menyimpan data ke database
	public function save($upload){
		$data = array(
			'id_blog' => $this->input->post(''),
			'judul_blog' => $this->input->post('judul_blog'),
			'tanggal_blog' => $this->input->post('tanggal_blog'),
			'content' => $this->input->post('content'),
			'Email' => $this->input->post('Email'),
			'Pengarang' => $this->input->post('Pengarang'),
			'Sumber' => $this->input->post('Sumber'),
			'gambar_blog' => $upload['file']['file_name']
			
			
		);
		
		$this->db->insert('nama', $data);
	}

	public function update($post, $id){
		//parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
		$judul_blog = $this->db->escape($post['judul_blog']);
		$tanggal_blog = $this->db->escape($post['tanggal_blog']);
		$content = $this->db->escape($post['content']);

		$sql = $this->db->query("UPDATE nama SET judul_blog = $judul_blog, tanggal_blog = $tanggal_blog, content = $content WHERE id_blog = ".intval($id));

		return true;
	}

	public function hapus($id){
		$sql = $this->db->query("DELETE from nama WHERE id_blog = ".intval($id));
	}	
}