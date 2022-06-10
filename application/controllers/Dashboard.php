<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Model_Produk");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["produk"] = $this->Model_Produk->getAll();
        $this->load->view("admin/partial/header");
        $this->load->view("admin/partial/navbar_sidebar");
        $this->load->view("admin/dashboard", $data);
        $this->load->view("admin/partial/footer");
        $this->load->view("admin/partial/footer_script");
    }

    public function add()
    {
        $product = $this->Model_Produk;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());
        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        redirect('Produk');
    }

    public function edit($id = null)
    {
        //if (!isset($id)) redirect('Produk');

        $product = $this->Model_Produk;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        redirect('Produk');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Model_Produk->delete($id)) {
            $this->session->set_flashdata('hapus', 'Berhasil Dihapus');
            redirect('Produk');
        }
    }
}
