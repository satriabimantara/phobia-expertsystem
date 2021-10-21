<?php
class Fobia extends Controller
{
    public function index()
    {
        $data['title_web'] = "Fobia";
        $data['fobia'] = $this->model('Fobia_model')->getAllFobia();
        $data['navbar'] = array(
            'nav-item1' => '<li class="nav-item" data-toggle="modal" data-target="#modalFobia"><a class="nav-link btn-tambahFobia" role="button">Tambah Fobia</a></li>'
        );
        $this->view("templates/header", $data);
        $this->view("fobia/index", $data);
        $this->view("templates/footer");
    }
    public function tambah()
    {
        if ($this->model("Fobia_model")->insertNewFobia($_POST)) {
            Flasher::setFlash("Data Fobia", "berhasil", "ditambahkan", "success");
            header("Location: " . BASEURL . "fobia");
            exit;
        } else {
            Flasher::setFlash("Data Fobia", "gagal", "ditambahkan", "danger");
            header("Location: " . BASEURL . "fobia");
            exit;
        }
    }
    public function ubah()
    {
        if ($this->model("Fobia_model")->updateFobia($_POST)) {
            Flasher::setFlash("Data Fobia", "berhasil", "diubah", "success");
            header("Location: " . BASEURL . "fobia");
            exit;
        } else {
            Flasher::setFlash("Data Fobia", "gagal", "diubah", "danger");
            header("Location: " . BASEURL . "fobia");
            exit;
        }
    }
    public function getubah()
    {
        echo json_encode($this->model('Fobia_model')->getSpesificFobia($_POST['id']));
    }
    public function hapus($id_fobia)
    {
        if ($this->model("Fobia_model")->deleteFobia($id_fobia)) {
            Flasher::setFlash("Data Fobia", "berhasil", "dihapus", "success");
            header("Location: " . BASEURL . "fobia");
            exit;
        } else {
            Flasher::setFlash("Data Fobia", "gagal", "dihapus", "danger");
            header("Location: " . BASEURL . "fobia");
            exit;
        }
    }
}
