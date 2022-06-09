<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengiriman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Model_Pengiriman");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->model('Model_Produk');
        $data['produk'] = $this->Model_Produk->getAll();
        $data["pengiriman"] = $this->Model_Pengiriman->getAll();
        $this->load->view("admin/partial/header");
        $this->load->view("admin/partial/navbar_sidebar");
        $this->load->view("admin/pengiriman", $data);
        $this->load->view("admin/partial/footer");
        $this->load->view("admin/partial/footer_script");
    }

    public function add()
    {
        $pengiriman = $this->Model_Pengiriman;
        $validation = $this->form_validation;
        $validation->set_rules($pengiriman->rules());
        if ($validation->run()) {
            $pengiriman->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        redirect('Pengiriman');
    }

    public function edit($id = null)
    {
        //if (!isset($id)) redirect('Produk');

        $pengiriman = $this->Model_Pengiriman;
        $validation = $this->form_validation;
        $validation->set_rules($pengiriman->rules());

        if ($validation->run()) {
            $pengiriman->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        redirect('Pengiriman');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Model_Pengiriman->delete($id)) {
            $this->session->set_flashdata('hapus', 'Berhasil Dihapus');
            redirect('Pengiriman');
        }
    }
}
