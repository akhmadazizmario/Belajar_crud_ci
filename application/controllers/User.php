<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
	private $view  	= "backend/v_user/";
	private $redirect 	= "User";

	public function __construct()
	{
		parent::__construct();
		//Load model
		$this->load->model('M_User');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$all = $this->M_User->all();
		$data = array(
			'judul'	=> "DATA USER",
			'sub'	=> "LIHAT USER",
			'all' => $all
		);
		$this->load->view($this->view . 'index', $data);
	}

	public function create()
	{
		$this->form_validation->set_rules('kd_user', 'Kode user', 'required|trim|is_unique[user.kd_user]', [
			'is_unique' => 'Kode telah digunakan!'
		]);
		$this->form_validation->set_rules('email_user', 'Email', 'required|trim|valid_email|is_unique[user.email_user]', [
			'is_unique' => 'Email telah digunakan!'
		]);
		$this->form_validation->set_rules('nm_user', 'Nama', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		$this->form_validation->set_rules('hp_user', 'Nomor HP', 'required|trim|min_length[10]|max_length[13]|numeric');
		if ($this->form_validation->run() == false) {
			$data = array(
				'judul'	=> "DATA USER",
				'sub'	=> "Tambah User",
				'create' 	=> ''
			);
			$this->load->view($this->view . 'create', $data);
		} else {
			$this->save();
		}
	}

	public function save()
	{
		$data = [
			'kd_user' => $this->input->post('kd_user'),
			'nm_user' => $this->input->post('nm_user'),
			'pswd_user' => md5($this->input->post('password1')),
			'hp_user' => $this->input->post('hp_user'),
			'email_user' => $this->input->post('email_user'),
			'img_user' => 'default.jpg',
		];
		$this->M_User->save($data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert" style="background-color:blue;color:white;">Data Berhasil ditambahkan </div>');
		redirect($this->redirect, 'refresh');
	}

	public function edit()
	{
		$kd   = $this->uri->segment(3);
		$this->form_validation->set_rules('nm_user', 'Nama', 'required|trim');
		$this->form_validation->set_rules('hp_user', 'Nomor HP', 'required|trim|min_length[10]|max_length[13]|numeric');
		if ($this->form_validation->run() == false) {
			$data = array(
				'judul'	=> "DATA USER",
				'sub'	=> "Ubah User",
				'edit' 	=> $this->M_User->edit($kd)
			);
		} else {
			$this->update();
		}
		$this->load->view($this->view . 'edit', $data);
	}

	public function update()
	{
		$kd = $this->uri->segment(3);
		//img_user
		$name_imguser = $_FILES['img_user']['name'];
		$type_imguser = $_FILES['img_user']['type'];
		$tmp_imguser  = $_FILES['img_user']['tmp_name'];
		//upload img
		if (!empty($tmp_imguser)) {
			if ($type_imguser != "image/jpeg" and $type_imguser != "image/jpg" and $type_imguser != "image/png") {
				$this->session->set_flashdata('message_false', 'Format gambar yang digunakan jpeg|jpg|png');
				redirect($this->redirect, 'refresh');
			} else {
				$img_user = UploadImg($_FILES['img_user'], './assets/img_user/', 'user', 300);
				$data = array(
					'nm_user' => $this->input->post('nm_user'),
					'hp_user' => $this->input->post('hp_user'),
					'img_user'            => $img_user
				);
			}
		} else {
			$data = array(
				'nm_user' => htmlspecialchars($this->input->post('nm_user')),
				'hp_user' => $this->input->post('hp_user')
			);
		}
		$this->M_User->update($kd, $data);
		//$this->session->set_flashdata('message_true', 'Profil telah berhasil diperbaharui, untuk max logout terlebih dulu');
		$this->session->set_flashdata('pesan2', '<div class="alert alert-success alert-message" role="alert" style="background-color:blue;color:white;">Data Berhasil di Ubah!! </div>');
		redirect($this->redirect, 'refresh');
	}

	public function delete()
	{
		$kd = $this->uri->segment(3);
		$data = array(
			'kd_user' => $kd
		);
		$this->M_User->delete($data);
		$this->session->set_flashdata('pesan3', '<div class="alert alert-success alert-message" role="alert" style="background-color:red;color:white;">Data Berhasil di Hapus!! </div>');
		redirect($this->redirect, 'refresh');
	}
}
