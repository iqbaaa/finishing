<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_Login extends CI_Model
{
    private $_table = "user";

    public $username;
    public $password;
    public $level;

    public function rules()
    {
        return [
            [
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required'
            ],
            [
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required'
            ]
        ];
    }

    public function cek_login($username)
    {

        $hasil = $this->db->where('username', $username)->limit(1)->get('user');
        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return array();
        }
    }

    public function getById()
    {
        $post = $this->input->post();
        $this->username = $post['username'];
        $this->password = $post['password'];
        return $this->db->get_where($this->_table, array('username' => $this->username, 'password' => $this->password))->row();
    }
}
