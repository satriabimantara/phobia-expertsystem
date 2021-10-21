<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $data['mhs']['nama']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $data['mhs']['nim']; ?></h6>
            <p class="card-text"><?= $data['mhs']['jurusan']; ?></p>
            <p class="card-text">Angkatan <?= $data['mhs']['angkatan']; ?></p>
            <a href="<?= BASEURL; ?>mahasiswa" class="card-link">Kembali</a>
        </div>
    </div>
</div>