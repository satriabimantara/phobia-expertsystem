<div class="alert alert-secondary" role="alert">
    <h4 class="alert-heading">Konsultasi</h4>
</div>
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <table class="table" id="table_konsultasi">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama Pengguna</th>
                        <th scope="col">Tanggal Konsultasi</th>
                        <th scope="col">Hasil Diagnosis</th>
                        <th scope="col">Nilai CF</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['daftar_konsultasi'] as $index => $konsultasi) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1; ?></th>
                            <td><?= $konsultasi['nama_user'] ?></td>
                            <td><?= $konsultasi['tgl_konsultasi'] ?></td>
                            <td><?= $konsultasi['diagnosis_konsultasi'] ?></td>
                            <td><?= $konsultasi['nilai_cf_konsultasi'] ?>%</td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="<?= BASEURL; ?>konsultasi/hapus/<?= $konsultasi['id_konsultasi'] ?>" onclick="return confirm('Hapus data konsultasi ini?');" title="Hapus Konsultasi">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>