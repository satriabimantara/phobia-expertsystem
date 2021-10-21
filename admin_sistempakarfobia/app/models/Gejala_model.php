<?php
class Gejala_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllData($table)
    {
        $query = "SELECT * FROM $table";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->result_set();
    }

    public function getAllDataGejalaAndTipeGejala()
    {
        $query = "SELECT * FROM gejala INNER JOIN tipegejala USING(id_tipegejala)";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->result_set();
    }

    // Gejala
    public function insertNewGejala($data)
    {
        $query = "INSERT INTO gejala VALUES ('',:kode_gejala,:nama_gejala,:pertanyaan_gejala,:id_tipegejala)";
        $this->db->query($query);
        $this->db->bind_param("kode_gejala", $data['kode_gejala']);
        $this->db->bind_param("nama_gejala", $data['nama_gejala']);
        $this->db->bind_param("pertanyaan_gejala", $data['pertanyaan_gejala']);
        $this->db->bind_param("id_tipegejala", $data['id_tipegejala']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function updateGejala($data)
    {
        $query = "UPDATE gejala SET
                    kode_gejala = :kode_gejala,
                    nama_gejala = :nama_gejala,
                    pertanyaan_gejala = :pertanyaan_gejala,
                    id_tipegejala = :id_tipegejala
                WHERE id_gejala=:id_gejala";
        $this->db->query($query);
        $this->db->bind_param("id_gejala", $data['id_gejala']);
        $this->db->bind_param("kode_gejala", $data['kode_gejala']);
        $this->db->bind_param("nama_gejala", $data['nama_gejala']);
        $this->db->bind_param("pertanyaan_gejala", $data['pertanyaan_gejala']);
        $this->db->bind_param("id_tipegejala", $data['id_tipegejala']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getSpesificGejala($id_gejala)
    {
        $query = "SELECT * FROM gejala INNER JOIN tipegejala USING(id_tipegejala) WHERE id_gejala =:id_gejala";
        $this->db->query($query);
        $this->db->bind_param("id_gejala", $id_gejala);
        return $this->db->single();
    }

    // Tipe Gejala
    public function insertNewTipeGejala($data)
    {
        $query = "INSERT INTO tipegejala VALUES ('',:nama_tipegejala,:deskripsi_tipegejala)";
        $this->db->query($query);
        $this->db->bind_param("nama_tipegejala", $data['nama_tipegejala']);
        $this->db->bind_param("deskripsi_tipegejala", $data['deskripsi_tipegejala']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getSpesificTipeGejala($id_tipegejala)
    {
        $query = "SELECT * FROM tipegejala WHERE id_tipegejala =:id_tipegejala";
        $this->db->query($query);
        $this->db->bind_param("id_tipegejala", $id_tipegejala);
        return $this->db->single();
    }

    public function updateTipeGejala($data)
    {
        $query = "UPDATE tipegejala SET
                    nama_tipegejala = :nama_tipegejala,
                    deskripsi_tipegejala = :deskripsi_tipegejala
                WHERE id_tipegejala=:id_tipegejala";
        $this->db->query($query);
        $this->db->bind_param("id_tipegejala", $data['id_tipegejala']);
        $this->db->bind_param("nama_tipegejala", $data['nama_tipegejala']);
        $this->db->bind_param("deskripsi_tipegejala", $data['deskripsi_tipegejala']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteTipeGejala($id_tipegejala)
    {
        $query = "DELETE FROM tipegejala WHERE id_tipegejala=:id_tipegejala";
        $this->db->query($query);
        $this->db->bind_param("id_tipegejala", $id_tipegejala);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deleteGejala($id_gejala)
    {
        $query = "DELETE FROM gejala WHERE id_gejala=:id_gejala";
        $this->db->query($query);
        $this->db->bind_param("id_gejala", $id_gejala);
        $this->db->execute();
        return $this->db->rowCount();
    }

    /*
    METHODS FOR RULE FOBIA GEJALA
    */
    public function checkDuplicates($data, $tables, $where_clauses, $bind_params)
    {
        $query = "SELECT * FROM $tables $where_clauses";
        $this->db->query($query);
        for ($i = 0; $i < count($bind_params); $i++) {
            $this->db->bind_param($bind_params[$i], $data[$bind_params[$i]]);
        }
        return $this->db->single();
    }
    public function insertNewRuleFobiaGejala($data)
    {
        $where_clauses = "WHERE id_fobia=:id_fobia AND id_gejala=:id_gejala";
        $bind_params = [
            'id_fobia',
            'id_gejala'
        ];
        $ifAnyDuplicates = $this->checkDuplicates($data, "detailfobia", $where_clauses, $bind_params);
        if ($ifAnyDuplicates) {
            echo 'Ada Duplicates';
            $return_value = 0;
            $detail_message = "Rule Fobia Gejala sudah ada di dalam tabel!";
        } else {
            $query = "INSERT INTO detailfobia VALUES ('',:id_fobia,:id_gejala)";
            $this->db->query($query);
            $this->db->bind_param("id_fobia", $data['id_fobia']);
            $this->db->bind_param("id_gejala", $data['id_gejala']);

            $this->db->execute();
            $return_value = $this->db->rowCount();
        }
        return array($return_value, $detail_message);
    }
    public function updateRuleFobiaGejala($data)
    {
        $query = "UPDATE detailfobia SET
                    id_fobia = :id_fobia,
                    id_gejala = :id_gejala,
                    bobot = :bobot
                WHERE id_detailfobia = :id_detailfobia";

        $this->db->query($query);
        $this->db->bind_param("id_fobia", $data['id_fobia']);
        $this->db->bind_param("id_gejala", $data['id_gejala']);
        $this->db->bind_param("id_detailfobia", $data['id_detailfobia']);
        $this->db->bind_param("bobot", $data['bobot_rule']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getSpecificRule($id_detailfobia)
    {
        $query = "SELECT * FROM detailfobia INNER JOIN fobia USING(id_fobia) INNER JOIN gejala USING(id_gejala) WHERE id_detailfobia =:id_detailfobia";
        $this->db->query($query);
        $this->db->bind_param("id_detailfobia", $id_detailfobia);
        return $this->db->single();
    }
    public function deleteRuleFobiaGejala($id_detailfobia)
    {
        $query = "DELETE FROM detailfobia WHERE id_detailfobia=:id_detailfobia";
        $this->db->query($query);
        $this->db->bind_param("id_detailfobia", $id_detailfobia);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
