<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {
	private $table 	= 'berita';
	private $pk 	= 'id_berita';

	public function GetAll(){
		$this->db->order_by ('tgl_berita', 'desc');
		$this->db->order_by ('jam_berita', 'desc');
		$this->db->join('admin','berita.kd_admin=admin.kd_admin');
		$this->db->join('kategori','berita.id_kategori=kategori.id_kategori');
		return $this->db->get($this->table);
	}

	public function save($data){
		return $this->db->insert($this->table, $data);
	}

	public function edit($kd){
		$this->db->where($this->pk, $kd);
		$this->db->join('kategori','berita.id_kategori=kategori.id_kategori');
		return $this->db->get($this->table)->row_array();
	}

	public function update($kd,$data){
		$this->db->where($this->pk, $kd);
		return $this->db->update($this->table, $data);
	}

	public function delete($data){
		$this->db->where($data);
		return $this->db->delete($this->table);
	}

	public function status($kd,$data){
		$this->db->where($this->pk, $kd);
		return $this->db->update($this->table, $data);
	}

	public function search($data){
		$this->db->like($this->pk, $data);
		$this->db->or_like('judul_berita', $data);
		$this->db->or_like('nama_kategori', $data);
		$this->db->join('kategori','berita.id_kategori=kategori.id_kategori');
		return $this->db->get($this->table);
	}

}
