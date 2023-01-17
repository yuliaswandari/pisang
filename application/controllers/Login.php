<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_system');
		$this->load->model('m_user');
	}

	public function index()
	{
		if ($this->session->userdata('is_login') == TRUE) {
			redirect('home', 'refresh');
		}
		$data['sys'] = $this->m_system->login()->row();
		$this->load->view('form_login', $data);
	}

	public function register()
	{
		$data['sys'] = $this->m_system->login()->row();
		$this->load->view('form_register', $data);
	}

	public function auth()
	{
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

		if ($this->form_validation->run() == TRUE) {

			if ($this->m_user->check_mail()->num_rows() == 1) {

				$db = $this->m_user->check_mail()->row();
				if (hash_verified($this->input->post('password'), $db->password)) {

					$data_login = array(
						'is_login' => TRUE,
						'id_user'  => $db->id_user
					);

					$this->session->set_userdata($data_login);
					$login = date('Y-m-d H:i:s');
					if ($this->m_user->update_login($login) == TRUE) {

						redirect('dashboard', 'refresh');
					} else {
						redirect('errorlogin', 'refresh');
					}
				} else {
					redirect('errorpassword', 'refresh');
				}
			} else { // jika email tidak terdaftar!
				redirect('erroremail', 'refresh');
			}
		} else {
			redirect('error', 'refresh');
		}
	}

	public function errorpassword()
	{
		$this->session->set_flashdata('error_login', 'Gagal masuk, password salah');
		$data['sys'] = $this->m_system->login()->row();
		$this->load->view('form_login', $data);
	}

	public function erroremail()
	{
		$this->session->set_flashdata('error_login', 'Gagal masuk, email tidak terdaftar');
		$data['sys'] = $this->m_system->login()->row();
		$this->load->view('form_login', $data);
	}

	public function error()
	{
		$this->session->set_flashdata('error_login', 'Gagal masuk, panjang karakter email atau password salah');
		$data['sys'] = $this->m_system->login()->row();
		$this->load->view('form_login', $data);
	}

	public function errorlogin()
	{
		$this->session->set_flashdata('error_login', 'Gagal saat proses masuk');
		$data['sys'] = $this->m_system->login()->row();
		$this->load->view('form_login', $data);
	}

	public function auth_register()
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == TRUE) {
			if ($this->m_user->register()) {
				$this->session->set_flashdata('message', 'Register berhasil, silahkan login.');
				redirect('login', 'refresh');
			} else {

				$data['sys'] = $this->m_system->login()->row();
				$this->load->view('form_register', $data);
			}
		} else {

			$data['sys'] = $this->m_system->login()->row();
			$this->load->view('form_register', $data);
		}
	}
}
