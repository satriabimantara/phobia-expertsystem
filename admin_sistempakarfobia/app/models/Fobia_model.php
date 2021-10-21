<?php
class Fobia_model
{
    private $db;
    private $table = "fobia";

    public function __construct()
    {
        $this->db = new Database;
    }
    public function insertNewFobia($data)
    {
        $query = "INSERT INTO " . $this->table . " VALUES ('',:namaumum_fobia,:namamedis_fobia,:deskripsi_fobia,:solusi_fobia)";
        $this->db->query($query);
        $this->db->bind_param("namaumum_fobia", $data['namaumum_fobia']);
        $this->db->bind_param("namamedis_fobia", $data['namamedis_fobia']);
        $this->db->bind_param("deskripsi_fobia", $data['deskripsi_fobia']);
        $this->db->bind_param("solusi_fobia", $data['solusi_fobia']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getAllFobia()
    {
        $query = "SELECT * FROM $this->table";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->result_set();
    }
    public function updateFobia($data)
    {
        $query = "UPDATE fobia SET
                    namaumum_fobia = :namaumum_fobia,
                    namamedis_fobia = :namamedis_fobia,
                    deskripsi_fobia = :deskripsi_fobia,
                    solusi_fobia = :solusi_fobia
                WHERE id_fobia=:id_fobia";
        $this->db->query($query);
        $this->db->bind_param("id_fobia", $data['id_fobia']);
        $this->db->bind_param("namaumum_fobia", $data['namaumum_fobia']);
        $this->db->bind_param("namamedis_fobia", $data['namamedis_fobia']);
        $this->db->bind_param("deskripsi_fobia", $data['deskripsi_fobia']);
        $this->db->bind_param("solusi_fobia", $data['solusi_fobia']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getSpesificFobia($id_fobia)
    {
        $query = "SELECT * FROM fobia WHERE id_fobia =:id_fobia";
        $this->db->query($query);
        $this->db->bind_param("id_fobia", $id_fobia);
        return $this->db->single();
    }
    public function deleteFobia($id_fobia)
    {
        $query = "DELETE FROM fobia WHERE id_fobia=:id_fobia";
        $this->db->query($query);
        $this->db->bind_param("id_fobia", $id_fobia);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getAllDetailFobia()
    {
        $query = "SELECT * FROM detailfobia INNER JOIN fobia USING(id_fobia) INNER JOIN gejala USING(id_gejala)";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->result_set();
    }
}
