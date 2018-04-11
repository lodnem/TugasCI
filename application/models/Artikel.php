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
	
	// Fungsi untuk menyimpan data ke database
	public function save($upload){
		$data = array(
			'id_blog' => $this->input->post('null'),
			'judul_blog' => $this->input->post('judul_atk'),
			'tanggal_blog' => $this->input->post('tggl_atk'),
			'content' => $this->input->post('isi_atk'),
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