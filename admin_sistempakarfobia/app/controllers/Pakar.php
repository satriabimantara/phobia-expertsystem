<?php
class Pakar extends Controller
{
    public function index()
    {
        $data['title_web'] = "Pakar";
        $data['navbar'] = array(
            'nav-item1' => '<li class="nav-item" data-toggle="modal" data-target="#modalPakar"><a class="nav-link" id="btn-tambahPakar" role="button" >Tambah Pakar</a></li>'
        );
        $data['daftar_pakar'] = $this->model("Pakar_model")->getAllPakar();
        $this->view("templates/header", $data);
        $this->view("pakar/index", $data);
        $this->view("templates/footer");
    }
    public function tambah()
    {
        if (isset($_POST)) {
            if ($this->model("Pakar_model")->insertNewPakar($_POST)) {
                Flasher::setFlash("Data Pakar", "berhasil", "ditambahkan", "success");
                header("Location: " . BASEURL . "pakar");
                exit;
            } else {
                Flasher::setFlash("Data Pakar", "gagal", "ditambahkan", "danger");
                header("Location: " . BASEURL . "pakar");
                exit;
            }
        }
    }
    public function ubah_pakar()
    {
        if (isset($_POST)) {
            // var_dump($_POST);
            if ($this->model("Pakar_model")->updatePakar($_POST)) {
                Flasher::setFlash("Data Pakar", "berhasil", "diubah", "success");
                header("Location: " . BASEURL . "pakar/");
                exit;
            } else {
                Flasher::setFlash("Data Pakar", "gagal", "diubah", "danger");
                header("Location: " . BASEURL . "pakar/");
                exit;
            }
        }
    }
    public function getubah_pakar()
    {
        echo json_encode($this->model('Pakar_model')->getSpesificPakar($_POST['id']));
    }
    public function hapus_pakar($id_pakar)
    {
        if ($this->model("Pakar_model")->deletePakar($id_pakar)) {
            Flasher::setFlash("Data Pakar", "berhasil", "dihapus", "success");
            header("Location: " . BASEURL . "pakar/");
            exit;
        } else {
            Flasher::setFlash("Data Pakar", "gagal", "dihapus", "danger");
            header("Location: " . BASEURL . "pakar/");
            exit;
        }
    }
}
