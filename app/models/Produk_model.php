<?php 


class Produk_model {
    private $table = 'produk';
    private $db;    
    public function __construct(){
        $this->db = new Database();
    }
    public function getAllProduk(){
        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
    }

    public function getProdukById($kode_barang){
        $this->db->query('SELECT * FROM '.$this->table.' WHERE kode_barang=:kode_barang');
        $this->db->bind('kode_barang',$kode_barang);
        return $this->db->single();
    }

    public function tambahDataProduk($data) {
        $fileName = uniqid().'_'. $_FILES['foto_barang']['name'];
        move_uploaded_file($_FILES['foto_barang']['tmp_name'], __DIR__ . '/../../public/uploads/' . $fileName);
        
        $query = "INSERT INTO produk (foto_barang, kode_barang, nama_barang, harga, stok, deskripsi) VALUES (:foto_barang, :kode_barang, :nama_barang, :harga, :stok, :deskripsi)";
        $this->db->query($query);
        $this->db->bind('foto_barang', $fileName); 
        $this->db->bind('kode_barang', $data['kode_barang']);
        $this->db->bind('nama_barang', $data['nama_barang']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('deskripsi',$data['deskripsi']);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }

    public function deleteDataProduk($kode_barang) {
        $produk = $this->getProdukById($kode_barang);
        $filePath = __DIR__ . '/../../public/uploads/' . $produk['foto_barang'];
        
        $this->db->query("DELETE FROM produk WHERE kode_barang = :kode_barang");
        $this->db->bind('kode_barang', $kode_barang);
        $this->db->execute();

        if (file_exists($filePath)) {
            unlink($filePath);
        }
    
        return $this->db->rowCount();
    }
    
    
}
    
    

