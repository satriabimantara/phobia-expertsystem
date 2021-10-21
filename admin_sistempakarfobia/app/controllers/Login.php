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
        Session::unsetSessionLogin("login_admin");
        header("Location: " . BASEURL . "login/");
        exit;
    }
    public function validate_login()
    {
        if (isset($_POST)) {
            list($return_value, $message) = $this->model('Login_model')->isValidAdmin($_POST);
            if ($return_value) {
                Session::setSessionLogin('login_admin');
                header("Location: " . BASEURL . "home");
                exit;
            } else {
                header("Location: " . BASEURL . "login");
                Flasher::setFlash("Login", "gagal", "dilakukan", "warning", $message);
                exit;
            }
        }
    }
}
