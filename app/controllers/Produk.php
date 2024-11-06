<?php

class Produk extends Controller{
    public function index(){
        $data['judul'] = 'Daftar Produk';
        $data['produk'] = $this->model('Produk_model')->getAllProduk();
        $this->view("templates/header", $data);
        $this->view('produk/index',$data);
        $this->view('templates/footer');
    }
    public function detail($kode_barang){
        $data['judul'] = 'Daftar Produk';
        $data['produk'] = $this->model('Produk_model')->getProdukById($kode_barang);
        $this->view("templates/header", $data);
        $this->view('produk/detail',$data);
        $this->view('templates/footer');
    }

    public function Tambah(){
        if ($this->model('Produk_model')->tambahDataProduk($_POST) > 0) {
            header('Location: '. BASEURL .'/produk');
            exit;
        }
    }

    public function Delete($kode_barang){
        if ($this->model('Produk_model')->deleteDataProduk($kode_barang) > 0) {
            header('Location: '. BASEURL . '/produk');
            exit;
        } else {
            echo 'Gagal Menghapus Data.';
        }
    }
}