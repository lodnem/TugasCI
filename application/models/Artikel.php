<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Model {	

	public function get_artikels($limit = FALSE, $offset = FALSE){
		if ( $limit ) {
            $this->db->limit($limit, $offset);
        }
		
        // Inner Join dengan table Categories
        $this->db->join('categories', 'categories.cat_id = blog.fk_cat_id');
		$query = $this->db->get('blog');
		return $query->result();
	}	


	public function get_total() 
    {
        // Dapatkan jumlah total artikel
        return $this->db->count_all("blog");
    }


	public function get_single($id)
	{
		$query = $this->db->query('select * from blog where id_blog='.$id);
		return $query->result();
	}

	public function get_default($id)
	{
		$data = array();
  		$options = array('id_blog' => $id);
  		$Q = $this->db->get_where('blog',$options,1);
    		if ($Q->num_rows() > 0){
      			$data = $Q->row_array();
   			}
  		$Q->free_result();
 		return $data;
	}

	public function get_artikel_by_id($id)
    {
         // Inner Join dengan table Categories
        $this->db->select ( '
            blog.*
        ' );
    	$query = $this->db->get_where('blog', array('blog.id_blog' => $id));
    	            
		return $query->row();
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
			'id_blog' => $this->input->post(''),
			'judul_blog' => $this->input->post('judul_blog'),
			'tanggal_blog' => $this->input->post('tanggal_blog'),
			'content' => $this->input->post('content'),
			'Email' => $this->input->post('Email'),
			'Pengarang' => $this->input->post('Pengarang'),
			'Sumber' => $this->input->post('Sumber'),
			'gambar_blog' => $upload['file']['file_name'],
			'fk_cat_id' => $this->input->post('id')
			
		);
		
		$this->db->insert('blog', $data);
	}

	public function update($post, $id){
		//parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
		$judul_blog = $this->db->escape($post['judul_blog']);
		$tanggal_blog = $this->db->escape($post['tanggal_blog']);
		$content = $this->db->escape($post['content']);
		$Email = $this->db->escape($post['Email']);
		$Pengarang = $this->db->escape($post['Pengarang']);
		$Sumber = $this->db->escape($post['Sumber']);
		$id_cat = $this->db->escape($post['id']);


		$sql = $this->db->query("UPDATE blog SET judul_blog = $judul_blog, tanggal_blog = $tanggal_blog, content = $content, Email = $Email, Pengarang = $Pengarang, Sumber = $Sumber, fk_cat_id = $id_cat WHERE id_blog = ".intval($id));

		return true;
	}

	public function hapus($id){
		$sql = $this->db->query("DELETE from blog WHERE id_blog = ".intval($id));
	}	
}