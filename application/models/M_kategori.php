<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {
	private $table 	= 'kategori';
	private $pk 	= 'id_kategori';

	public function GetAll()
	{
		$this->db->order_by('nama_kategori', 'asc');
		return $this->db->get($this->table);
	}

	public function save($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function edit($kd)
	{
		$this->db->where($this->pk, $kd);
		return $this->db->get($this->table)->row_array();
	}

	public function update($kd,$data)
	{
		$this->db->where($this->pk, $kd);
		return $this->db->update($this->table, $data);
	}

	public function delete($data)
	{
		$this->db->where($data);
		return $this->db->delete($this->table);
	}

	public function search($data){
		$this->db->like($this->pk, $data);
		$this->db->or_like('nama_kategori', $data);
		return $this->db->get($this->table);
	}

}
