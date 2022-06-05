<?php
class Matakuliah_model extends CI_model{
    public $id, $nama, $sks, $kode;

    public function getAll(){
        // menampilkan seluruh data yang ada di table matakuliah menggunakan query builder
        $query = $this->db->get('matakuliah');
        return $query->result();
    }
    public function getById($id){
        // menampilkan data berdasarkan id
        $query = $this->db->get_where('matakuliah', ['id'=>$id]);
        return $query->row();
    }
    public function simpan($data){
        //insert into bertujuan untuk menginput atau memasukan data yang dikirim ke dalam database
        $sql = "INSERT INTO matakuliah (nama,sks,kode) VALUES (?,?,?)";

        $this->db->query($sql, $data);

        $insert_id = $this->db->insert_id();
        return $this->getById($insert_id);
    }
    public function update($data){
        $sql = "UPDATE matakuliah SET nama=?,sks=?,kode=? WHERE id=?";
        this->db->query($sql, $data);
    }
    public function delete($data){
        // hapus data matakuliah
        $sql = "DELETE FROM matakuliah WHERE id=?";
        $this->db->query($sql, $data);
    }
}
?>