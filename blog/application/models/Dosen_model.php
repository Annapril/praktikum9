<?php
class Dosen_model extends CI_model{
    public $id, $nama, $nidn, $gender, $tmp_lahir, $tgl_lahir, $pendidikan;

    public function getAll(){
        // menampilkan seluruh data yang ada di table dosen menggunakan query builder
        $query = $this->db->get('dosen');
        return $query->result();
    }
    public function getById($id){
        // menampilkan data berdasarkan id
        $query = $this->db->get_where('dosen', ['id'=>$id]);
        return $query->row();
    }
    public function simpan($data){
        //insert into bertujuan untuk menginput atau memasukan data yang dikirim ke dalam database
        $sql = "INSERT INTO dosen (nama,nidn,gender,tmp_lahir,tgl_lahir,pendidikan) VALUES (?,?,?,?,?,?)";

        $this->db->query($sql, $data);

        $insert_id = $this->db->insert_id();
        return $this->getById($insert_id);
    }
    public function update($data){
        $sql = "UPDATE dosen SET nama=?,nidn=?,gender=?,tmp_lahir=?,tgl_lahir=?,pendidikan=? WHERE id=?";
        this->db->query($sql, $data);
    }
    public function delete($data){
        // hapus data mahasiswa
        $sql = "DELETE FROM dosen WHERE id=?";
        $this->db->query($sql, $data);
    }
}

?>