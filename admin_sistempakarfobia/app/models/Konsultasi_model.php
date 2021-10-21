<?php
class Konsultasi_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllDetailKonsultasi()
    {
        $query = "SELECT * FROM konsultasi INNER JOIN user USING(id_user)";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->result_set();
    }
    public function deleteKonsultasi($id_konsultasi)
    {
        $query = "DELETE FROM konsultasi WHERE id_konsultasi = :id_konsultasi";
        $this->db->query($query);
        $this->db->bind_param("id_konsultasi", $id_konsultasi);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
