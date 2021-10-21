<?php
class About extends Controller
{
    public function index($nama = "Satria Bimantara", $pekerjaan = "Web Developer", $usia = 32)
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['usia'] = $usia;
        $data['title_web'] = "About";
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page()
    {
        $data['title_web'] = "Page";
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
}
