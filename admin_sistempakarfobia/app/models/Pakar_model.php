<?php
class Pakar_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllPakar()
    {
        $query = "SELECT * FROM pakar";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->result_set();
    }
    public function getSpesificPakar($id_pakar)
    {
        $query = "SELECT * FROM pakar WHERE id_pakar = :id_pakar";
        $this->db->query($query);
        $this->db->bind_param("id_pakar", $id_pakar);
        $this->db->execute();
        return $this->db->single();
    }
    public function updatePakar($data)
    {
        $query = "UPDATE pakar SET
                    nama_pakar = :nama_pakar,
                    spesialis_pakar = :spesialis_pakar,
                    pendidikan_pakar = :pendidikan_pakar,
                    hp_pakar = :hp_pakar,
                    alamat_pakar = :alamat_pakar,
                    email_pakar = :email_pakar
                  WHERE id_pakar=:id_pakar";
        $this->db->query($query);
        $this->db->bind_param("nama_pakar", $data['nama_pakar']);
        $this->db->bind_param("spesialis_pakar", $data['spesialis_pakar']);
        $this->db->bind_param("pendidikan_pakar", $data['pendidikan_pakar']);
        $this->db->bind_param("hp_pakar", $data['hp_pakar']);
        $this->db->bind_param("alamat_pakar", $data['alamat_pakar']);
        $this->db->bind_param("email_pakar", $data['email_pakar']);

        $this->db->bind_param("id_pakar", $data['id_pakar']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function insertNewPakar($data)
    {
        $query = "INSERT INTO pakar VALUES ('',:nama_pakar,:spesialis_pakar,:pendidikan_pakar,:alamat_pakar,:hp_pakar,:email_pakar)";
        $this->db->query($query);
        $this->db->bind_param("nama_pakar", $data['nama_pakar']);
        $this->db->bind_param("spesialis_pakar", $data['spesialis_pakar']);
        $this->db->bind_param("pendidikan_pakar", $data['pendidikan_pakar']);
        $this->db->bind_param("alamat_pakar", $data['alamat_pakar']);
        $this->db->bind_param("hp_pakar", $data['hp_pakar']);
        $this->db->bind_param("email_pakar", $data['email_pakar']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deletePakar($id_pakar)
    {
        $query = "DELETE FROM pakar WHERE id_pakar=:id_pakar";
        $this->db->query($query);
        $this->db->bind_param("id_pakar", $id_pakar);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
