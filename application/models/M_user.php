<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function index()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            redirect('dashboard', 'refresh');
        }

        $this->template->load('role', 'user/form_login');
    }

    public function check_mail()
    {
        return $this->db->get_where('user', array('email' => $this->input->post('email')));
    }

    public function hasil()
    {
        $response = array();
        $this->db->select('*');
        $this->db->from('result');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->order_by('id', 'desc');
        $q = $this->db->get();
        $response = $q->result_array();

        return $response;
    }


    public function identifikasi()
    {
        $response = array();
        $this->db->select('*');
        $this->db->from('identifikasi');
        $q = $this->db->get();
        $response = $q->result_array();

        return $response;
    }

    public function hasilall()
    {
        $response = array();
        $this->db->select('r.create_at as create_at, r.id as id, r.total_bobot as bobot,
        r.hasil as hasil, u.name as user');
        $this->db->from('result r');
        $this->db->join('user u', 'r.id_user = u.id_user');
        $this->db->order_by('r.id', 'desc');
        $q = $this->db->get();
        $response = $q->result_array();

        return $response;
    }

    public function konsultasi()
    {
        $response = array();
        $this->db->select('q.*, a.message as reply, a.timestamp as timestampadmin');
        $this->db->from('question q');
        $this->db->where('q.id_user', $this->session->userdata('id_user'));
        $this->db->join('answer a', 'q.id_question = a.id_question', 'left');
        $this->db->order_by('q.id_question', 'desc');
        $q = $this->db->get();
        $response = $q->result_array();

        return $response;
    }

    public function konsultasiall()
    {
        $response = array();
        $this->db->select('q.*, a.message as reply, a.timestamp as timestampadmin, u.name as user');
        $this->db->from('question q');
        $this->db->join('user u', 'q.id_user = u.id_user');
        $this->db->join('answer a', 'q.id_question = a.id_question', 'left');
        $this->db->order_by('q.id_question', 'desc');
        $q = $this->db->get();
        $response = $q->result_array();

        return $response;
    }

    public function update_login($login)
    {
        $this->db->set('last_login', $login);
        $this->db->where('id_user', $this->session->userdata('id_user'));
        return $this->db->update('user');
    }

    public function update_user()
    {
        $data = array(
            'name' => $this->input->post('nama'),
            'password' => get_hash($this->input->post('password'))
        );
        $this->db->set($data);
        $this->db->where('id_user', $this->input->post('id_user'));
        return $this->db->update('user');
    }

    public function update_user_name()
    {
        $data = array(
            'name' => $this->input->post('nama')
        );
        $this->db->set($data);
        $this->db->where('id_user', $this->input->post('id_user'));
        return $this->db->update('user');
    }

    public function user_detail()
    {
        $this->db->select('u.*, r.name as role');
        $this->db->from('user u');
        $this->db->where('u.id_user', $this->session->userdata('id_user'));
        $this->db->join('role r', 'u.id_role = r.id_role');
        $query = $this->db->get();
        return $query;
    }

    public function user_all()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where_not_in('id_role', 1);
        $query = $this->db->get();
        return $query;
    }

    public function register()
    {
        $data = array(
            'name' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => get_hash($this->input->post('password')),
            'id_role' => 2
        );

        return $this->db->insert('user', $data);
    }

    public function saveidentifikasi($jml, $hasil)
    {
        $data = array(
            'id_user' => $this->session->userdata('id_user'),
            'total_bobot' => $jml,
            'hasil'    => $hasil
        );

        return $this->db->insert('result', $data);;
    }
}
