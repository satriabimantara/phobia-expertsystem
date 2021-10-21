<?php
class Mahasiswa_model
{
    private $db; //menampung kelas Database wrapper
    private $table = "mahasiswa"; //tabel yang dituju di database

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->result_set();
    }
    public function getSpesificMahasiswa($id)
    {
        // binding
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
        $this->db->bind_param("id", $id);
        return $this->db->single();
    }
    public function insertNewMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa VALUES ('',:nama,:nim,:jurusan,:angkatan)";
        $this->db->query($query);
        $this->db->bind_param("nama", $data['nama_mhs']);
        $this->db->bind_param("nim", $data['nim_mhs']);
        $this->db->bind_param("jurusan", $data['jurusan_mhs']);
        $this->db->bind_param("angkatan", $data['angkatan_mhs']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deleteMahasiswa($id_mahasiswa)
    {
        $query = "DELETE FROM mahasiswa WHERE id=:id";
        $this->db->query($query);
        $this->db->bind_param("id", $id_mahasiswa);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function updateMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET
                    nama = :nama,
                    nim = :nim,
                    jurusan = :jurusan,
                    angkatan = :angkatan
                  WHERE id=:id";
        $this->db->query($query);
        $this->db->bind_param("id", $data['id_mhs']);
        $this->db->bind_param("nama", $data['nama_mhs']);
        $this->db->bind_param("nim", $data['nim_mhs']);
        $this->db->bind_param("jurusan", $data['jurusan_mhs']);
        $this->db->bind_param("angkatan", $data['angkatan_mhs']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function cariMahasiswa($keyword)
    {
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword OR jurusan LIKE :keyword";
        $this->db->query($query);
        $this->db->bind_param("keyword", "%$keyword%");
        return $this->db->result_set();
    }
}
