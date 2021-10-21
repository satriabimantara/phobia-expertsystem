<?php
class Konsultasi_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getDataRules()
    {
        $query = "SELECT * FROM detailfobia INNER JOIN fobia USING(id_fobia) INNER JOIN gejala USING(id_gejala)";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->result_set();
    }
    public function getAllDataGejala()
    {
        $query = "SELECT * FROM gejala";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->result_set();
    }

    // CERTAINTY FACTOR
    public function getAllBobotByFobia($db_data)
    {
        $bobot_pakar = array();
        foreach ($db_data['daftar_fobia'] as $indeks  => $fobia) {
            $id_fobia = $fobia['id_fobia'];
            $bobot_pakar[$id_fobia] = array();
            $query = "SELECT kode_gejala,bobot FROM detailfobia INNER JOIN gejala USING(id_gejala) WHERE id_fobia =:id_fobia";
            $this->db->query($query);
            $this->db->bind_param('id_fobia', $id_fobia);
            $this->db->execute();
            $data_bobot = $this->db->result_set();
            foreach ($data_bobot as $bobot) {
                $key = $bobot['kode_gejala'];
                $value = $bobot['bobot'];
                array_push($bobot_pakar[$id_fobia], array($key => $value));
            }
        }
        return $bobot_pakar;
    }
    public function certaintyFactor($user_data, $db_data)
    {
        // Menghitung hasil kali cf user dan cf pakar
        $hasilKaliBobotPakarUser = array();
        foreach ($db_data['daftar_bobot_pakar'] as $id_fobia => $dataBobotPerFobia) {
            $hasilKaliBobotPakarUser[$id_fobia] = array();
            foreach ($user_data as $kode_gejala => $cf_user) {
                foreach ($dataBobotPerFobia as $bobot) {
                    $key = key($bobot);
                    if ($key == $kode_gejala) {
                        $cf_pakar = $bobot[key($bobot)];
                        $hasilKali = $cf_pakar * $cf_user;
                        array_push($hasilKaliBobotPakarUser[$id_fobia], array($key => $hasilKali));
                        break;
                    }
                }
            }
        }

        // Menghitung CF Combine
        $hasilCFCombine = array();
        foreach ($hasilKaliBobotPakarUser as $id_fobia  => $hasilKaliPerFobia) {
            $cf_gejala1 = $hasilKaliPerFobia[0][key($hasilKaliPerFobia[0])];
            $cf_gejala2 = $hasilKaliPerFobia[1][key($hasilKaliPerFobia[1])];
            $cf_combine = $cf_gejala1 + ($cf_gejala2 * (1 - $cf_gejala1));
            for ($i = 2; $i < count($hasilKaliPerFobia); $i++) {
                $cf_gejala_ke_i = $hasilKaliPerFobia[$i][key($hasilKaliPerFobia[$i])];
                $cf_combine = $cf_combine + ($cf_gejala_ke_i * (1 - $cf_combine));
            }
            $cf_combine = $cf_combine * 100;
            array_push($hasilCFCombine, array($id_fobia => $cf_combine));
        }
        // Sorting nilai cf_combine yang didapatkan
        $temp = array();
        for ($i = 0; $i < count($hasilCFCombine); $i++) {
            for ($j = 0; $j < count($hasilCFCombine) - 1 - $i; $j++) {
                $value1 = $hasilCFCombine[$j][key($hasilCFCombine[$j])];
                $value2 = $hasilCFCombine[$j + 1][key($hasilCFCombine[$j + 1])];
                if ($value1 < $value2) {
                    $temp = $hasilCFCombine[$j];
                    $hasilCFCombine[$j] = $hasilCFCombine[$j + 1];
                    $hasilCFCombine[$j + 1] = $temp;
                }
            }
        }
        return $hasilCFCombine;
    }
    public function getDiagnosisFobia($data)
    {
        $diagnosis = array();
        $hasilCFCombine = $data['hasilCFCombine'];
        $id_fobia_max = key($hasilCFCombine[0]);
        $tingkat_keyakinan = $hasilCFCombine[0][$id_fobia_max];
        foreach ($data['daftar_fobia'] as $idx  => $fobia) {
            if ($fobia['id_fobia'] == $id_fobia_max) {
                array_push($diagnosis, $fobia);
                break;
            }
        }
        return array($diagnosis, $tingkat_keyakinan);
    }
    public function getRuleTerpilihDanDatabase($ruleTerpilih, $data)
    {
        $id_fobia_terdiagnosis = $data['diagnosis'][0]['id_fobia'];
        $rules = $data['daftar_rule'];
        $rule_gejala_terpilih = array();
        $rule_fobia_terdiagnosis = array();
        // Cari daftar rule sesuai id_fobia terdiagnosis
        foreach ($rules as $indeks => $rule) {
            if ($rule['id_fobia'] == $id_fobia_terdiagnosis) {
                array_push($rule_fobia_terdiagnosis, $rule);
            }
        }
        // Masukkan semua daftar gejala yang dipilih dari user
        foreach ($ruleTerpilih as $kode_gejala => $bobot) {
            if ($bobot > 0) {
                foreach ($rules as $indeks => $rule) {
                    if ($kode_gejala == $rule['kode_gejala']) {
                        $rule['bobot_user'] = $bobot;
                        array_push($rule_gejala_terpilih, $rule);
                        break;
                    }
                }
            }
        }
        return array($rule_gejala_terpilih, $rule_fobia_terdiagnosis);
    }
    public function saveKonsultasi($data)
    {
        $query = "INSERT INTO konsultasi VALUES ('',:id_user,:tgl_konsultasi,:diagnosis_konsultasi,:nilai_cf_konsultasi)";
        $this->db->query($query);
        $this->db->bind_param("id_user", $data['id_user']);
        $this->db->bind_param("tgl_konsultasi", $data['tgl_konsultasi']);
        $this->db->bind_param("diagnosis_konsultasi", $data['diagnosis_konsultasi']);
        $this->db->bind_param("nilai_cf_konsultasi", $data['nilai_cf_konsultasi']);

        $this->db->execute();
        //get last inserted ID
        $last_id = $this->db->getLastId();
        return $last_id;
    }
    public function saveDetailKonsultasi($id_konsultasi, $gejala_terpilih)
    {
        $row_count = array();
        $query = "INSERT INTO detailkonsultasi VALUES ('',:id_konsultasi,:id_gejala)";
        foreach ($gejala_terpilih as $gejala) {
            //insert
            $this->db->query($query);
            $this->db->bind_param("id_konsultasi", $id_konsultasi);
            $this->db->bind_param("id_gejala", $gejala['id_gejala']);
            $this->db->execute();
            $result = $this->db->rowCount();
            array_push($row_count, $result);
        }
        if (in_array(0, $row_count)) {
            return 0;
        } else {
            return 1;
        }
    }
}
