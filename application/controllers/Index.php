<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Index extends CI_Controller{
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model("Model_Login");
            $this->load->library('form_validation');
            $this->load->library('session');
        }

        public function index()
        {
            $this->load->view("login");
            
        }
        public function loginForm()
        {
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
     
            if ($this->form_validation->run() == FALSE) {
     
                $errors = $this->form_validation->error_array();
                $this->session->set_flashdata('errors', $errors);
                $this->session->set_flashdata('input', $this->input->post());
                redirect('Index');
             
            } else {
     
                $username = htmlspecialchars($this->input->post('username'));
                $pass = htmlspecialchars($this->input->post('password'));
                $cek_login = $this->Model_Login->cek_login($username);  
     
                if($cek_login == FALSE)
                {
     
                    $this->session->set_flashdata('error_login', 'username yang Anda masukan tidak terdaftar.');
                    redirect('index.php/auth');
     
                } else {
     
                    if($cek_login->password && $cek_login->level=="1" ){
                        $this->session->set_userdata('idUser', $cek_login->idUser);
                        $this->session->set_userdata('name', $cek_login->name);
                        $this->session->set_userdata('username', $cek_login->username);
                        $this->session->set_userdata('level', $cek_login->level); 
                        
                        redirect('Dashboard');
     
                    }elseif ($cek_login->password && $cek_login->level=="2" ){
                      
                        $this->session->set_userdata('idUser', $cek_login->idUser);
                        $this->session->set_userdata('name', $cek_login->name);
                        $this->session->set_userdata('username', $cek_login->username);
                        $this->session->set_userdata('level', $cek_login->level); 
     
                        redirect('DashboardM');
                    }
                     else {
     
                        $this->session->set_flashdata('error_login', 'username atau password yang Anda masukan salah.');
                        redirect('Index');
     
                    }
                }
            }
        }
           public function logout()
        {
            $this->session->sess_destroy();
            echo '<script>
                alert("Sukses! Anda berhasil logout."); 
                window.location.href="'.base_url('Index').'";
                </script>';
        }
    }
