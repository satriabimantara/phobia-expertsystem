<?php
class Login extends Controller
{
    private $data;
    public function __construct()
    {
        $this->data['title_web'] = "Login";
    }
    public function index()
    {
        $this->view('templates/header_login', $this->data);
        $this->view('login/index', $this->data);
        $this->view('templates/footer_login');
    }
    public function logout()
    {
        Session::unsetSessionLogin("login_user");
        header("Location: " . BASEURL);
        exit;
    }
    public function validate_login()
    {
        if (isset($_POST)) {
            list($return_value, $message, $user) = $this->model('Login_model')->isValidUser($_POST);
            if ($return_value) {
                Session::setSessionLogin('login_user', $user);
                header("Location: " . BASEURL . "home");
                exit;
            } else {
                header("Location: " . BASEURL . "login");
                Flasher::setFlash("Login", "gagal", "dilakukan", "warning", $message);
                exit;
            }
        }
    }

    /*REGISTER */
    public function register()
    {
        $this->data['title_web'] = "Registrasi Pengguna";
        $this->view('templates/header_login', $this->data);
        $this->view('login/register', $this->data);
        $this->view('templates/footer_login');
    }
    public function tambah_user()
    {
        if (isset($_POST)) {
            list($return_value, $message) = $this->model("Login_model")->insertNewUser($_POST);
            if ($return_value) {
                Flasher::setFlash("Data Pengguna", "berhasil", "ditambahkan", "success", $message);
                header("Location: " . BASEURL . "login/register");
                exit;
            } else {
                Flasher::setFlash("Data Pengguna", "gagal", "ditambahkan", "warning", $message);
                header("Location: " . BASEURL . "login/register");
                exit;
            }
        }
    }
}
