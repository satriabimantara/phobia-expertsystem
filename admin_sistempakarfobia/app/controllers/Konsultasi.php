<?php
class Konsultasi extends Controller
{
    private $data;
    public function __construct()
    {
        $this->data = array();
        $this->data['title_web'] = "Konsultasi";
    }
    public function index()
    {
        $this->data['daftar_konsultasi'] = $this->model("Konsultasi_model")->getAllDetailKonsultasi();
        $this->view('templates/header', $this->data);
        $this->view('konsultasi/index', $this->data);
        $this->view('templates/footer');
    }
    public function hapus($id_konsultasi)
    {
        if ($this->model("Konsultasi_model")->deleteKonsultasi($id_konsultasi)) {
            Flasher::setFlash("Data Konsultasi", "berhasil", "dihapus", "success");
            header("Location: " . BASEURL . "konsultasi/");
            exit;
        } else {
            Flasher::setFlash("Data Konsultasi", "gagal", "dihapus", "danger");
            header("Location: " . BASEURL . "konsultasi/");
            exit;
        }
    }
}
