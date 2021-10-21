<?php
class Gejala extends Controller
{
    private $data;
    private $url;
    public function __construct()
    {
        $this->url = array();
        $this->url['nav-item1'] = BASEURL . "gejala/daftargejala";
        $this->url['nav-item2'] = BASEURL . "gejala/tipegejala";
        $this->url['nav-item3'] = BASEURL . "gejala/fobiagejala";
        $this->data = array();
        $this->data['navbar'] = array(
            'nav-item1' => '<li class="nav-item"><a class="nav-link" href="' . $this->url['nav-item1'] . '">Daftar Gejala</a></li>',
            'nav-item2' => '<li class="nav-item"><a class="nav-link" href="' . $this->url['nav-item2'] . '">Tipe Gejala</a></li>',
            'nav-item3' => '<li class="nav-item"><a class="nav-link" href="' . $this->url['nav-item3'] . '">Gangguan Fobia-Gejala</a></li>',
        );
    }
    public function index()
    {
        $this->data['title_web'] = "Daftar Gejala";
        $this->view("templates/header", $this->data);
        $this->view("gejala/index", $this->data);
        $this->view("templates/footer");
    }
    // Daftar Gejala
    public function daftargejala()
    {
        $this->data['title_web'] = "Daftar Gejala";
        $this->data['gejala'] = $this->model("Gejala_model")->getAllDataGejalaAndTipeGejala();
        $this->data['tipegejala'] = $this->model("Gejala_model")->getAllData("tipegejala");
        $this->view("templates/header", $this->data);
        $this->view("gejala/daftargejala", $this->data);
        $this->view("templates/footer");
    }
    public function tambah_gejala()
    {
        if (isset($_POST)) {
            if ($this->model("Gejala_model")->insertNewGejala($_POST)) {
                Flasher::setFlash("Data Gejala", "berhasil", "ditambahkan", "success");
                header("Location: " . BASEURL . "gejala/daftargejala");
                exit;
            } else {
                Flasher::setFlash("Data Gejala", "gagal", "ditambahkan", "danger");
                header("Location: " . BASEURL . "gejala/daftargejala");
                exit;
            }
        }
    }
    public function ubah_gejala()
    {
        if (isset($_POST)) {
            if ($this->model("Gejala_model")->updateGejala($_POST)) {
                Flasher::setFlash("Data Gejala", "berhasil", "diubah", "success");
                header("Location: " . BASEURL . "gejala/daftargejala");
                exit;
            } else {
                Flasher::setFlash("Data Gejala", "gagal", "diubah", "danger");
                header("Location: " . BASEURL . "gejala/daftargejala");
                exit;
            }
        }
    }
    public function getubah_gejala()
    {
        echo json_encode($this->model('Gejala_model')->getSpesificGejala($_POST['id']));
    }


    // Tipe Gejala
    public function tipegejala()
    {
        $this->data['title_web'] = "Tipe Gejala";
        $this->data['tipe_gejala'] = $this->model("Gejala_model")->getAllData("tipegejala");
        $this->view("templates/header", $this->data);
        $this->view("gejala/tipegejala", $this->data);
        $this->view("templates/footer");
    }
    public function tambah_tipegejala()
    {
        if (isset($_POST)) {
            if ($this->model("Gejala_model")->insertNewTipeGejala($_POST)) {
                Flasher::setFlash("Data Tipe Gejala", "berhasil", "ditambahkan", "success");
                header("Location: " . BASEURL . "gejala/tipegejala");
                exit;
            } else {
                Flasher::setFlash("Data Tipe Gejala", "gagal", "ditambahkan", "warning");
                header("Location: " . BASEURL . "gejala/tipegejala");
                exit;
            }
        }
    }
    public function ubah_tipegejala()
    {
        if (isset($_POST)) {
            if ($this->model("Gejala_model")->updateTipeGejala($_POST)) {
                Flasher::setFlash("Data Tipe Gejala", "berhasil", "diubah", "success");
                header("Location: " . BASEURL . "gejala/tipegejala");
                exit;
            } else {
                Flasher::setFlash("Data Tipe Gejala", "gagal", "diubah", "danger");
                header("Location: " . BASEURL . "gejala/tipegejala");
                exit;
            }
        }
    }
    public function getubah_tipegejala()
    {
        echo json_encode($this->model('Gejala_model')->getSpesificTipeGejala($_POST['id']));
    }
    public function hapus_tipegejala($id_tipegejala)
    {
        if ($this->model("Gejala_model")->deleteTipeGejala($id_tipegejala)) {
            Flasher::setFlash("Data Tipe Gejala", "berhasil", "dihapus", "success");
            header("Location: " . BASEURL . "gejala/tipegejala");
            exit;
        } else {
            Flasher::setFlash("Data Tipe Gejala", "gagal", "dihapus", "danger");
            header("Location: " . BASEURL . "gejala/tipegejala");
            exit;
        }
    }
    public function hapus_gejala($id_gejala)
    {
        if ($this->model("Gejala_model")->deleteGejala($id_gejala)) {
            Flasher::setFlash("Data Gejala", "berhasil", "dihapus", "success");
            header("Location: " . BASEURL . "gejala/daftargejala");
            exit;
        } else {
            Flasher::setFlash("Data Gejala", "gagal", "dihapus", "danger");
            header("Location: " . BASEURL . "gejala/daftargejala");
            exit;
        }
    }

    //Fobia Gejala
    public function fobiagejala()
    {
        $this->data['title_web'] = "Rule Fobia Gejala";
        $this->data['rule_fobia_gejala'] = $this->model("Fobia_model")->getAllDetailFobia();
        $this->data['daftar_fobia'] = $this->model("Fobia_model")->getAllFobia();
        $this->data['daftar_gejala'] = $this->model("Gejala_model")->getAllData("gejala");
        $this->view("templates/header", $this->data);
        $this->view("gejala/fobiagejala", $this->data);
        $this->view("templates/footer");
    }

    public function tambah_rulefobiagejala()
    {
        if (isset($_POST)) {
            list($return_value, $detail_message) = $this->model("Gejala_model")->insertNewRuleFobiaGejala($_POST);
            if ($return_value) {
                Flasher::setFlash("Data Rule", "berhasil", "ditambahkan", "success");
                header("Location: " . BASEURL . "gejala/fobiagejala");
                exit;
            } else {
                Flasher::setFlash("Data Rule", "gagal", "ditambahkan", "warning", $detail_message);
                header("Location: " . BASEURL . "gejala/fobiagejala");
                exit;
            }
        }
    }
    public function getubah_namagejala()
    {
        echo json_encode($this->model('Gejala_model')->getSpesificGejala($_POST['id']));
    }
    public function getubah_rule()
    {
        echo json_encode($this->model('Gejala_model')->getSpecificRule($_POST['id']));
    }
    public function ubah_rule()
    {
        if (isset($_POST)) {
            if ($this->model("Gejala_model")->updateRuleFobiaGejala($_POST)) {
                Flasher::setFlash("Data Rule Fobia", "berhasil", "diubah", "success");
                header("Location: " . BASEURL . "gejala/fobiagejala");
                exit;
            } else {
                Flasher::setFlash("Data Rule Fobia", "gagal", "diubah", "danger");
                header("Location: " . BASEURL . "gejala/fobiagejala");
                exit;
            }
        }
    }

    public function hapus_rule($id_detailfobia)
    {
        if ($this->model("Fobia_model")->deleteRuleFobiaGejala($id_detailfobia)) {
            Flasher::setFlash("Data Rule Fobia Gejala", "berhasil", "dihapus", "success");
            header("Location: " . BASEURL . "gejala/fobiagejala");
            exit;
        } else {
            Flasher::setFlash("Data Rule Fobia Gejala", "gagal", "dihapus", "danger");
            header("Location: " . BASEURL . "gejala/fobiagejala");
            exit;
        }
    }
}
