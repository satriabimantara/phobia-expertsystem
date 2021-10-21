<?php
class Admin extends Controller
{
    private $data;
    private $url;
    public function __construct()
    {
        $this->url = array();
        $this->url['nav-item1'] = BASEURL . "admin/managepakar";
        $this->url['nav-item2'] = BASEURL . "admin/listadmin";
        $this->data = array();
        $this->data['navbar'] = array(
            'nav-item1' => '<li class="nav-item"><a class="nav-link" href="' . $this->url['nav-item1'] . '">Pengaturan Pakar</a></li>',
            'nav-item2' => '<li class="nav-item"><a class="nav-link" href="' . $this->url['nav-item2'] . '">Daftar Administrator</a></li>',

        );
    }
    public function index()
    {
        $this->data['title_web'] = "Admin";
        $this->view("templates/header", $this->data);
        $this->view("admin/index", $this->data);
        $this->view("templates/footer");
    }
    /*
    CONTROLLERS FOR LISTADMIN
    */
    public function listadmin()
    {
        $this->data['title_web'] = "Daftar Administrator";
        $this->data['daftar_admin'] = $this->model("Admin_model")->getAllAdmin();
        $this->view("templates/header", $this->data);
        $this->view("admin/listadmin", $this->data);
        $this->view("templates/footer");
    }
    public function tambah_admin()
    {
        if (isset($_POST)) {
            if ($this->model("Admin_model")->insertNewAdmin($_POST)) {
                Flasher::setFlash("Data Admin", "berhasil", "ditambahkan", "success");
                header("Location: " . BASEURL . "admin/listadmin");
                exit;
            } else {
                Flasher::setFlash("Data Admin", "gagal", "ditambahkan", "warning");
                header("Location: " . BASEURL . "admin/listadmin");
                exit;
            }
        }
    }
    public function ubah_admin()
    {
        if (isset($_POST)) {
            if ($this->model("Admin_model")->updateAdmin($_POST)) {
                Flasher::setFlash("Data Admin", "berhasil", "diubah", "success");
                header("Location: " . BASEURL . "admin/listadmin");
                exit;
            } else {
                Flasher::setFlash("Data Admin", "gagal", "diubah", "danger");
                header("Location: " . BASEURL . "admin/listadmin");
                exit;
            }
        }
    }
    public function getubah_admin()
    {
        echo json_encode($this->model('Admin_model')->getSpesificAdmin($_POST['id']));
    }
    public function hapus_admin($id_admin)
    {
        if ($this->model("Admin_model")->deleteAdmin($id_admin)) {
            Flasher::setFlash("Data Admin", "berhasil", "dihapus", "success");
            header("Location: " . BASEURL . "admin/listadmin");
            exit;
        } else {
            Flasher::setFlash("Data Admin", "gagal", "dihapus", "danger");
            header("Location: " . BASEURL . "admin/listadmin");
            exit;
        }
    }

    /*
    CONTROLLER FOR MANAGEPAKAR
    */
    public function managepakar()
    {
        $this->data['title_web'] = "Pengaturan Pakar";
        $this->view("templates/header", $this->data);
        $this->view("admin/managepakar", $this->data);
        $this->view("templates/footer");
    }
}
