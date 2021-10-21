<?php
class Riwayat extends Controller
{
    private $data;
    public function __construct()
    {
        $this->data = array();
        // check jika ada session login dari user
        $nama_session = "login_user";
        if (Session::checkSessionLogin($nama_session)) {
            $this->data['user_login'] = Session::getSessionUser();
        }
        $this->data['title_web'] = "Riwayat Konsultasi";
    }
    public function index()
    {
        // get data riwayat konsultasi dari user
        $this->data['riwayat_konsultasi'] = $this->model("Riwayat_model")->getSpecificDataRiwayat($this->data['user_login']);
        $this->data['detailkonsultasi'] = $this->model("Riwayat_model")->getSpecificRiwayatGejala($this->data['riwayat_konsultasi']);

        $this->view('templates/header', $this->data);
        $this->view('riwayat/index', $this->data);
        $this->view('templates/footer');
    }
}
