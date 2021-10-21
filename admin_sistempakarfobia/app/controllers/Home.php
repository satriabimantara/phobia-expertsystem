<?php
class Home extends Controller
{
    private $data;
    public function __construct()
    {
        $this->data['title_web'] = "Home";
    }
    public function index()
    {
        $this->view('templates/header', $this->data);
        $this->view('home/index', $this->data);
        $this->view('templates/footer');
    }
}
