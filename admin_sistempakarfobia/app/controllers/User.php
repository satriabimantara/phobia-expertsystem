<?php
class User extends Controller
{
    private $data;
    public function __construct()
    {
        $this->data = array();
        $this->data['title_web'] = "User";
    }
    public function index()
    {
        $this->data['daftar_user'] = $this->model("User_model")->getAllUser();
        $this->view("templates/header", $this->data);
        $this->view("user/index", $this->data);
        $this->view("templates/footer");
    }
    public function ubah_user()
    {
        if (isset($_POST)) {
            if ($this->model("User_model")->updateUser($_POST)) {
                Flasher::setFlash("Data User", "berhasil", "diubah", "success");
                header("Location: " . BASEURL . "user/");
                exit;
            } else {
                Flasher::setFlash("Data User", "gagal", "diubah", "danger");
                header("Location: " . BASEURL . "user/");
                exit;
            }
        }
    }
    public function getubah_user()
    {
        echo json_encode($this->model('User_model')->getSpesificUser($_POST['id']));
    }
    public function hapus_user($id_user)
    {
        if ($this->model("User_model")->deleteUser($id_user)) {
            Flasher::setFlash("Data User", "berhasil", "dihapus", "success");
            header("Location: " . BASEURL . "user/");
            exit;
        } else {
            Flasher::setFlash("Data User", "gagal", "dihapus", "danger");
            header("Location: " . BASEURL . "user/");
            exit;
        }
    }
}
