<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= BASEURL; ?>css/bootstrap.css">
    <!-- Connect to our style css -->
    <link rel="stylesheet" href="<?= BASEURL; ?>css/style.css">
    <!-- Data Tabel -->
    <link rel="stylesheet" href="<?= BASEURL; ?>css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>css/buttons.bootstrap4.min.css">
    <!-- Fontawesom -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?= $data['title_web'] ?></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand text-white" href="<?= BASEURL; ?>">SISKARFOBIA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>home">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['login_user'])) : ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?= BASEURL; ?>user/profile">Profile</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?= BASEURL; ?>konsultasi/">Konsultasi</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?= BASEURL; ?>riwayat/">Riwayat</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item ">
                        <?php if (isset($_SESSION['login_user'])) : ?>
                            <a class="nav-link" href="<?= BASEURL; ?>login/logout">Logout</a>
                        <?php else : ?>
                            <a class="nav-link" href="<?= BASEURL; ?>login/">Login</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron jumbotron-dashboard jumbotron-fluid">
        <div class="container">
            <h1 class='display-4'>
                <span>Sistem Pakar</span><br>
                Diagnosis Fobia Menggunakan<br>
                <span>Metode Certainty Factor</span>
            </h1>
        </div>
    </div>