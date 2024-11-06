<?php

class Pelanggan extends Controller{
    public function index() {
        $data['judul'] = 'Pelanggan';
        $data['pelanggan'] = $this->model('Pelanggan_model')->getAllPelanggan();
        $this->view("templates/header", $data);
        $this->view('pelanggan/index',$data);
        $this->view('templates/footer');
    }

    public function detail($id_pelanggan){
        $data['judul'] = 'Detail Pelanggan';
        $data['pelanggan'] = $this->model('Pelanggan_model')->getPelangganById($id_pelanggan);
        $this->view("templates/header", $data);
        $this->view('pelanggan/detail',$data);
        $this->view('templates/footer');
    }
}