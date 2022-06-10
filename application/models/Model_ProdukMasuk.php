<?php defined('BASEPATH') or exit('No direct script access alowed');

class Model_ProdukMasuk extends CI_Model
{
    private $_table = 'produkmasuk';

    public $idProdukMasuk;
    public $idProdukFK;
    public $qty;
    public $status;

    public function rules()
    {
        return [
            [
                'field' => 'idProdukFK',
                'label' => 'Produk',
                'rules' => 'required'
            ],

            [
                'field' => 'qty',
                'label' => 'qty',
                'rules' => 'numeric|required'
            ],

            [
                'field' => 'status',
                'label' => 'status',
                'rules' => 'required'
            ]

        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('produkmasuk');
        $this->db->join('dataproduk', 'dataproduk.idProduk = produkmasuk.idProdukFK');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["idProdukMasuk" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->idProdukFK = $post['idProdukFK'];
        $this->qty = $post['qty'];
        $this->status = $post['status'];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->idProdukFK = $post['idProdukFK'];
        $this->qty = $post['qty'];
        $this->status = $post['status'];
        $this->idProdukMasuk = $post['id'];

        $this->db->update($this->_table, $this, array('idProdukMasuk' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idProdukMasuk" => $id));
    }
}
