<?php

class Pelanggan_model{
    private $table = 'pelanggan';
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function getAllPelanggan(){
        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
    }

    public function getPelangganById($id_pelanggan){
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id_pelanggan=:id_pelanggan');
        $this->db->bind('id_pelanggan',$id_pelanggan);
        return $this->db->single();
    }
}