<?php
class User extends Controller
{
    private $data;
    private $url;
    public function __construct()
    {
        $this->data = array();
        $this->url = array();
        $this->data['title_web'] = "Pengguna";
    }
    public function profile()
    {
        $this->data['title_web'] = "Profile Pengguna";
        $this->view('templates/header', $this->data);
        if (Session::checkSessionLogin("login_user")) {
            $this->view('user/profile', $this->data);
        } else {
            $this->view('home/index', $this->data);
        }
        $this->view('templates/footer');
    }
    public function ubah_user()
    {
        if (isset($_POST)) {

            if ($this->model("User_model")->updateUser($_POST)) {
                // Perbarui session pengguna
                $user = $this->model("User_model")->getSpesificUser($_POST['id_user']);
                Session::setSessionLogin("login_user", $user);
                Flasher::setFlash("Data Pengguna", "berhasil", "diubah", "success");
                header("Location: " . BASEURL . "user/profile");
                exit;
            } else {
                Flasher::setFlash("Data Pengguna", "gagal", "diubah", "danger");
                header("Location: " . BASEURL . "user/profile");
                exit;
            }
        }
    }
}
