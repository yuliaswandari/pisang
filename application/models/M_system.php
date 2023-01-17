<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_system extends CI_Model
{
    public function login()
    {
        return $this->db->get('system');
    }
}
