<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Model_Stock");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["stock"] = $this->Model_Stock->getAll();
        $this->load->view("admin/partial/header");
        $this->load->view("admin/partial/navbar_sidebar");
        $this->load->view("admin/stock", $data);
        $this->load->view("admin/partial/footer");
        $this->load->view("admin/partial/footer_script");
    }

    public function add()
    {
        $product = $this->Model_Stock;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());
        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        redirect('Stock');
    }

    public function edit($id = null)
    {
        //if (!isset($id)) redirect('stock');

        $product = $this->Model_Stock;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        redirect('Stock');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Model_Stock->delete($id)) {
            $this->session->set_flashdata('hapus', 'Berhasil Dihapus');
            redirect('Stock');
        }
    }
}
