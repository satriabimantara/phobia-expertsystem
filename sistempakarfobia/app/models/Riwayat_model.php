<?php
class Riwayat_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getSpecificDataRiwayat($user)
    {
        $query = "SELECT * FROM konsultasi WHERE id_user=:id_user";
        $this->db->query($query);
        $this->db->bind_param("id_user", $user['id_user']);
        $this->db->execute();
        return $this->db->result_set();
    }
    public function getSpecificRiwayatGejala($riwayat_konsultasi)
    {
        $detailkonsultasi = array();
        foreach ($riwayat_konsultasi as $konsultasi) {
            $id_konsultasi = $konsultasi['id_konsultasi'];
            $detailkonsultasi[$id_konsultasi] = array();
            //select specific gejala berdasarkan riwayat konsultasi
            $query = "SELECT * FROM detailkonsultasi INNER JOIN gejala USING(id_gejala) WHERE id_konsultasi=:id_konsultasi";
            $this->db->query($query);
            $this->db->bind_param("id_konsultasi", $id_konsultasi);
            $this->db->execute();
            array_push($detailkonsultasi[$id_konsultasi], $this->db->result_set());
        }
        return $detailkonsultasi;
    }
}
