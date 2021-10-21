<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        $data['title_web'] = "Mahasiswa";
        $data['mhs'] = $this->model("Mahasiswa_model")->getAllMahasiswa();
        $this->view("templates/header", $data);
        $this->view("mahasiswa/index", $data);
        $this->view("templates/footer");
    }
    public function detail($id)
    {
        $data['title_web'] = "Detail Mahasiswa";
        $data['mhs'] = $this->model("Mahasiswa_model")->getSpesificMahasiswa($id);
        $this->view("templates/header", $data);
        $this->view("mahasiswa/detail", $data);
        $this->view("templates/footer");
    }
    public function tambah()
    {
        if ($this->model("Mahasiswa_model")->insertNewMahasiswa($_POST)) {
            Flasher::setFlash("berhasil", "ditambahkan", "success");
            header("Location: " . BASEURL . "mahasiswa");
            exit;
        } else {
            Flasher::setFlash("gagal", "ditambahkan", "danger");
            header("Location: " . BASEURL . "mahasiswa");
            exit;
        }
    }
    public function hapus($id_mahasiswa)
    {
        if ($this->model("Mahasiswa_model")->deleteMahasiswa($id_mahasiswa)) {
            Flasher::setFlash("berhasil", "dihapus", "success");
            header("Location: " . BASEURL . "mahasiswa");
            exit;
        } else {
            Flasher::setFlash("gagal", "dihapus", "danger");
            header("Location: " . BASEURL . "mahasiswa");
            exit;
        }
    }
    public function getubah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getSpesificMahasiswa($_POST['id']));
    }
    public function ubah()
    {
        if ($this->model("Mahasiswa_model")->updateMahasiswa($_POST)) {
            Flasher::setFlash("berhasil", "diubah", "success");
            header("Location: " . BASEURL . "mahasiswa");
            exit;
        } else {
            Flasher::setFlash("gagal", "diubah", "danger");
            header("Location: " . BASEURL . "mahasiswa");
            exit;
        }
    }

    public function cari()
    {
        $keyword = $_POST['cari_mhs'];
        $data['title_web'] = "Mahasiswa";
        $data['mhs'] = $this->model("Mahasiswa_model")->cariMahasiswa($keyword);
        $this->view("templates/header", $data);
        $this->view("mahasiswa/index", $data);
        $this->view("templates/footer");
    }
}
