<?php defined('BASEPATH') OR exit('No direct script access alowed');

class Model_Stock extends CI_Model
{
    private $_table = 'stock';

    public $idStock;
    public $namaProduk;
    public $qty;
    public $ukuran;
    public $letakProduk;    

    public function rules()
    {
        return [
            [
                'field' => 'namaProduk',
                'label' => 'Nama Produk',
                'rules' => 'required'
            ],

            [
                'field' => 'qty',
                'label' => 'qty',
                'rules' => 'numeric|required'
            ],

            [
                'field' => 'ukuran',
                'label' => 'Ukuran',
                'rules' => 'required'
            ],

            [
                'field' => 'letakProduk',
                'label' => 'letak produk',
                'rules' => 'required'
            ]
            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["idStock"=> $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->namaProduk = $post['namaProduk'];
        $this->qty = $post['qty'];
        $this->ukuran = $post['ukuran'];
        $this->letakProduk = $post['letakProduk'];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->namaProduk = $post['namaProduk'];
        $this->qty = $post['qty'];
        $this->ukuran = $post['ukuran'];
        $this->letakProduk = $post['letakProduk'];
        $this->idStock = $post['id'];

        $this->db->update($this->_table, $this, array('idStock' => $post['id']) );
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idStock" => $id));
    }
}
