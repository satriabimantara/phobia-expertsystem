<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= BASEURL; ?>css/bootstrap.css">
    <!-- Custom scrollbar -->
    <link rel="stylesheet" href="<?= BASEURL; ?>css/jquery-mCustomScrollbar.css">
    <!-- Connect to our style css -->
    <link rel="stylesheet" href="<?= BASEURL; ?>css/style.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>css/sidebar.css">

    <!-- Data Tabel -->
    <link rel="stylesheet" href="<?= BASEURL; ?>css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>css/buttons.bootstrap4.min.css">

    <!-- Fontawesom -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title><?= $data['title_web'] ?></title>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Sistem Pakar Fobia</h3>
            </div>
            <ul class="list-unstyled components ">
                <!-- <li class="active sidebar-li">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li> -->
                <li>
                    <a href="<?= BASEURL; ?>home"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>admin"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp; Admin</a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>pakar"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Pakar</a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>user"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp; User</a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>fobia"><i class="fa fa-medkit" aria-hidden="true"></i>&nbsp; Gangguan Fobia</a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>gejala"><i class="fa fa-sign-language" aria-hidden="true"></i>&nbsp; Gejala</a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>konsultasi"><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp; Konsultasi</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fa fa-list" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <?php
                            if (isset($data['navbar'])) {
                                foreach ($data['navbar'] as $nav) {
                                    echo $nav;
                                }
                            }
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= BASEURL; ?>login/logout" onclick="return confirm('Logout Halaman Admin?');" title="Logout">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>