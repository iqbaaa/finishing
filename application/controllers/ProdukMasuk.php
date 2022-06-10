<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProdukMasuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Model_ProdukMasuk");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->model('Model_Produk');
        $data['produk'] = $this->Model_Produk->getAll();
        $data["produkmasuk"] = $this->Model_ProdukMasuk->getAll();
        $this->load->view("admin/partial/header");
        $this->load->view("admin/partial/navbar_sidebar");
        $this->load->view("admin/produkMasuk", $data);
        $this->load->view("admin/partial/footer");
        $this->load->view("admin/partial/footer_script");
    }

    public function add()
    {
        $produkMasuk = $this->Model_ProdukMasuk;
        $validation = $this->form_validation;
        $validation->set_rules($produkMasuk->rules());
        if ($validation->run()) {
            $produkMasuk->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        redirect('ProdukMasuk');
    }

    public function edit($id = null)
    {
        //if (!isset($id)) redirect('ProdukMasuk');

        $produkMasuk = $this->Model_ProdukMasuk;
        $validation = $this->form_validation;
        $validation->set_rules($produkMasuk->rules());

        if ($validation->run()) {
            $produkMasuk->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        redirect('ProdukMasuk');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Model_ProdukMasuk->delete($id)) {
            $this->session->set_flashdata('hapus', 'Berhasil Dihapus');
            redirect('ProdukMasuk');
        }
    }
}
