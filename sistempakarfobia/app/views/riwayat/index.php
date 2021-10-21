<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-10 service-panel">
            <div class="row">
                <div class="col-lg-6">
                    <?php Flasher::flash(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="alert alert-secondary" role="alert">
                        <h4 class="alert-heading">Riwayat Konsultasi</h4>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <table class="table " id="table_riwayat_konsultasi">
                        <thead>
                            <tr>
                                <th scope="col">Nomor</th>
                                <th scope="col">Tanggal Konsultasi</th>
                                <th scope="col">Hasil Diagnosis</th>
                                <th scope="col">Nilai Keyakinan</th>
                                <th scope="col">Riwayat Gejala</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['riwayat_konsultasi'] as $index => $riwayat) : ?>
                                <tr>
                                    <th scope="row"><?= $index + 1; ?></th>
                                    <td><?= $riwayat['tgl_konsultasi']; ?></td>
                                    <td><?= $riwayat['diagnosis_konsultasi']; ?></td>
                                    <td><?= $riwayat['nilai_cf_konsultasi']; ?>%</td>
                                    <td>

                                        <ul class="list-group list-group-flush">
                                            <?php foreach ($data['detailkonsultasi'][$riwayat['id_konsultasi']] as $detailkonsultasi) : ?>
                                                <?php foreach ($detailkonsultasi as $detail) : ?>
                                                    <li class="list-group-item">
                                                        <?= $detail['nama_gejala'] ?>
                                                    </li>
                                                <?php endforeach; ?>

                                            <?php endforeach; ?>
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>