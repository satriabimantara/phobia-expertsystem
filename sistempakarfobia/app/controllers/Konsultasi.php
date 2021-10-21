<?php
class Konsultasi extends Controller
{
    private $data;
    public function __construct()
    {
        $this->data = array();
        $this->url = array();
        // check jika ada session login dari user
        $nama_session = "login_user";
        if (Session::checkSessionLogin($nama_session)) {
            $this->data['user_login'] = Session::getSessionUser();
        }
        $this->data['daftar_rule'] = $this->model("Konsultasi_model")->getDataRules();
        $this->data['daftar_gejala'] = $this->model("Konsultasi_model")->getAllDataGejala();
        $this->data['daftar_fobia'] = $this->model("Fobia_model")->getAllDataFobia();
        $this->data['title_web'] = "Konsultasi";
    }
    public function index()
    {
        $this->view('templates/header', $this->data);
        $this->view('konsultasi/index', $this->data);
        $this->view('templates/footer');
    }
    public function diagnosis()
    {
        $this->data['daftar_bobot_pakar'] = $this->model("Konsultasi_model")->getAllBobotByFobia($this->data);
        $this->data['hasilCFCombine'] = $this->model("Konsultasi_model")->certaintyFactor($_POST, $this->data);
        list($this->data['diagnosis'], $this->data['tingkat_keyakinan']) = $this->model("Konsultasi_model")->getDiagnosisFobia($this->data);
        list($this->data['rule_gejala_terpilih'], $this->data['rule_fobia_terdiagnosis']) = $this->model("Konsultasi_model")->getRuleTerpilihDanDatabase($_POST, $this->data);
        Session::setSession("gejala_terpilih", $this->data['rule_gejala_terpilih']);
        $this->data['tingkat_keyakinan'] = round($this->data['tingkat_keyakinan'], 2);

        $this->data['title_web'] = "Hasil Konsultasi";
        $this->view('templates/header', $this->data);
        $this->view('konsultasi/hasilkonsultasi', $this->data);
        $this->view('templates/footer');
    }
    public function simpan()
    {
        if (isset($_POST)) {
            $data = array();
            $data['id_user'] = $this->data['user_login']['id_user'];
            $data['tgl_konsultasi'] = date("Y-m-d");
            $data['diagnosis_konsultasi'] = $_POST['diagnosis_konsultasi'];
            $data['nilai_cf_konsultasi'] = $_POST['nilai_cf_konsultasi'];
            $this->data['gejala_terpilih'] = Session::getSession("gejala_terpilih");
            $last_id = $this->model('Konsultasi_model')->saveKonsultasi($data);
            //simpan daftar gejala yang dipilih ke detailkonsultasi
            $rowInserted = $this->model("Konsultasi_model")->saveDetailKonsultasi($last_id, $this->data['gejala_terpilih']);

            if ($rowInserted) {
                Flasher::setFlash("Hasil konsultasi", "berhasil", "disimpan", "success");
            } else {
                Flasher::setFlash("Hasil konsultasi", "gagal", "disimpan", "danger");
            }
            header("Location: " . BASEURL . "riwayat/");
            exit;
        }
    }
}
