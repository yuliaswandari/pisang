<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_system');
	}

	public function index()
	{
		$data['sys'] = $this->m_system->login()->row();
		$this->template->load('home/role', 'home/home', $data);
	}
}
