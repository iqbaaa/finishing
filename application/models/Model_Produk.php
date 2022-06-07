<?php defined('BASEPATH') OR exit('No direct script access alowed');

class Model_Produk extends CI_Model
{
    private $_table = 'dataproduk';

    public $idProduk;
    public $namaProduk;
    public $Qty;
    public $Ukuran;
    public $warna;
    public $nomerPemesanan;

    public function rules()
    {
        return [
            [
                'field' => 'namaProduk',
                'label' => 'Nama Produk',
                'rules' => 'required'
            ],

            [
                'field' => 'Qty',
                'label' => 'qty',
                'rules' => 'numeric|required'
            ],

            [
                'field' => 'Ukuran',
                'label' => 'Ukuran',
                'rules' => 'required'
            ],

            [
                'field' => 'warna',
                'label' => 'warna',
                'rules' => 'required'
            ],

            [
                'field' => 'nomerPemesanan',
                'label' => 'Nomer Pemesanan',
                'rules' => 'required'
            ],
            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["idProduk"=> $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->namaProduk = $post['namaProduk'];
        $this->Qty = $post['Qty'];
        $this->Ukuran = $post['Ukuran'];
        $this->warna = $post['warna'];
        $this->nomerPemesanan = $post['nomerPemesanan'];

        $this->db->insert($this->_table, $this);
    }
}
?>