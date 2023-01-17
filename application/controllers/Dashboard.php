<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_system');
		$this->load->model('m_user');
	}

	public function index()
	{
		if ($this->session->userdata('is_login') == FALSE) {
			redirect('login', 'refresh');
		}
		$data['sys'] = $this->m_system->login()->row();
		$data['user'] = $this->m_user->user_detail()->row();
		$data['identifikasi'] = $this->m_user->identifikasi();

		if ($this->session->userdata('id_user') != 1) { //user
			$data['result'] = $this->m_user->hasil();
			$this->template->load('dashboard/role', 'dashboard/dashboard', $data);
		} else { //admin
			$data['resultall'] = $this->m_user->hasilall();
			$this->template->load('dashboard/role', 'dashboard/dashboardadmin', $data);
		}
	}

	public function konsultasi()
	{
		if ($this->session->userdata('is_login') == FALSE) {
			redirect('login', 'refresh');
		}
		$data['sys'] = $this->m_system->login()->row();
		$data['user'] = $this->m_user->user_detail()->row();

		if ($this->session->userdata('id_user') != 1) { //user
			$data['konsultasi'] = $this->m_user->konsultasi();
			$this->template->load('dashboard/role', 'dashboard/konsultasi', $data);
		} else { //admin
			$data['konsultasiall'] = $this->m_user->konsultasiall();
			$this->template->load('dashboard/role', 'dashboard/konsultasiadmin', $data);
		}
	}

	public function pengguna()
	{
		if ($this->session->userdata('is_login') == FALSE) {
			redirect('login', 'refresh');
		}

		if ($this->session->userdata('id_user') != 1) {
			redirect('dashboard', 'refresh');
		}

		$data['sys'] = $this->m_system->login()->row();
		$data['user'] = $this->m_user->user_detail()->row();
		$data['userall'] = $this->m_user->user_all()->result();
		$this->template->load('dashboard/role', 'dashboard/pengguna', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('is_login');
		$this->session->unset_userdata('email');
		session_destroy();
		redirect('login', 'refresh');
	}

	public function saveidentifikasi()
	{
		$jml = 0;
		foreach ($_POST['identifikasi'] as $value) {
			$jml += $value;
		}

		if ($jml == 0) {
			$hasil = 'Kurang Layak';
		} else if ($jml <= 0.5) {
			$hasil = 'Cukup Layak';
		} else if ($jml <= 1) {
			$hasil = 'Layak';
		}

		$this->m_user->saveidentifikasi($jml, $hasil);
		$this->session->set_flashdata('hasil', '' . $hasil . "");
		redirect('dashboard', 'refresh');
	}

	public function savequestion()
	{
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'subject' => $this->input->post('subject'),
			'message' => $this->input->post('message')
		);

		return $this->db->insert('question', $data);
	}

	public function saveanswer()
	{
		$data = array(
			'id_question' => $this->input->post('id_question'),
			'message' => $this->input->post('replyConsult')
		);

		if ($this->db->insert('answer', $data)) {
			$this->session->set_flashdata('successreply', 'Reply berhasil tersimpan.');
			redirect('konsultasi', 'refresh');
		} else {
			$this->session->set_flashdata('erroreply', 'Reply gagal tersimpan. Coba lagi.');
			redirect('konsultasi', 'refresh');
		}
	}

	public function updateuser()
	{
		if ($this->input->post('password') != NULL) {
			//change password
			$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

			if ($this->form_validation->run() == TRUE) { //proses update
				if ($this->m_user->update_user()) {
					$this->session->set_flashdata('successreply', 'Perubahan data pengguna berhasil.');
					redirect('pengguna', 'refresh');
				} else {
					$this->session->set_flashdata('errorreply', 'Perubahan data gagal.');
					redirect('pengguna', 'refresh');
				}
			} else {
				$this->session->set_flashdata('errorreply', 'Gagal, mohon isi nama, password dan confirm password yang benar.');
				redirect('pengguna', 'refresh');
			}
		} else {
			//no change password, only name
			$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');

			if ($this->form_validation->run() == TRUE) { //proses update
				if ($this->m_user->update_user_name()) {
					$this->session->set_flashdata('successreply', 'Perubahan data pengguna berhasil.');
					redirect('pengguna', 'refresh');
				} else {
					$this->session->set_flashdata('errorreply', 'Perubahan data gagal.');
					redirect('pengguna', 'refresh');
				}
			} else {
				$this->session->set_flashdata('errorreply', 'Perubahan data gagal, mohon isi nama lengkap.');
				redirect('pengguna', 'refresh');
			}
		}
	}

	public function updateprofile()
	{
		if ($this->input->post('password') != NULL) {
			//change password
			$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

			if ($this->form_validation->run() == TRUE) { //proses update
				if ($this->m_user->update_user()) {
					$this->session->set_flashdata('successreply', 'Perubahan data pengguna berhasil.');
					redirect('dashboard', 'refresh');
				} else {
					$this->session->set_flashdata('errorreply', 'Perubahan data gagal.');
					redirect('dashboard', 'refresh');
				}
			} else {
				$this->session->set_flashdata('errorreply', 'Gagal, mohon isi nama, password dan confirm password yang benar.');
				redirect('dashboard', 'refresh');
			}
		} else {
			//no change password, only name
			$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');

			if ($this->form_validation->run() == TRUE) { //proses update
				if ($this->m_user->update_user_name()) {
					$this->session->set_flashdata('successreply', 'Perubahan data pengguna berhasil.');
					redirect('dashboard', 'refresh');
				} else {
					$this->session->set_flashdata('errorreply', 'Perubahan data gagal.');
					redirect('dashboard', 'refresh');
				}
			} else {
				$this->session->set_flashdata('errorreply', 'Perubahan data gagal, mohon isi nama lengkap.');
				redirect('dashboard', 'refresh');
			}
		}
	}
}
