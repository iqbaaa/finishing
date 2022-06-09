<?php defined('BASEPATH') OR exit('No direct script access alowed');

class Model_Pengiriman extends CI_Model
{
    private $_table = 'pengiriman';

    public $idPengiriman;
    public $idProdukFK;
    public $qty;
    public $tanggalKirim;
    public $noSuratJalan;
    public $status;

    public function rules()
    {
        return [
            [
                'field' => 'idProdukFK',
                'label' => 'Nama Produk',
                'rules' => 'required'
            ],

            [
                'field' => 'qty',
                'label' => 'qty',
                'rules' => 'numeric|required'
            ],

            [
                'field' => 'tanggalKirim',
                'label' => 'tanggal Kirim',
                'rules' => 'required'
            ],

            [
                'field' => 'noSuratJalan',
                'label' => 'noSuratJalan',
                'rules' => 'required'
            ],

            [
                'field' => 'status',
                'label' => 'status',
                'rules' => 'required'
            ],
            
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('pengiriman');
        $this->db->join('dataproduk', 'dataproduk.idProduk = pengiriman.idProdukFK');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["idPengiriman"=> $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->idProdukFK = $post['idProdukFK'];
        $this->qty = $post['qty'];
        $this->tanggalKirim = $post['tanggalKirim'];
        $this->noSuratJalan = $post['noSuratJalan'];
        $this->status = $post['status'];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->idProdukFK = $post['idProdukFK'];
        $this->qty = $post['qty'];
        $this->tanggalKirim = $post['tanggalKirim'];
        $this->noSuratJalan = $post['noSuratJalan'];
        $this->status = $post['status'];
        $this->idPengiriman = $post['id'];

        $this->db->update($this->_table, $this, array('idPengiriman' => $post['id']) );
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idPengiriman" => $id));
    }
}
