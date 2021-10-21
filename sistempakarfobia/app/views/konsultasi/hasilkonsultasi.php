<div class="container ">
    <div class="row justify-content-center">
        <div class="col service-panel">
            <div class="row">
                <div class="col">
                    <div class="alert alert-danger d-flex justify-content-between" role="alert">
                        <h2 class="alert-heading">Hasil Diagnosis</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="<?= BASEURL; ?>konsultasi/simpan" method="post">
                        <input type="hidden" name="diagnosis_konsultasi" value="<?= $data['diagnosis'][0]['namaumum_fobia']; ?>">
                        <input type="hidden" name="nilai_cf_konsultasi" value="<?= $data['tingkat_keyakinan']; ?>">
                        <div class="card">
                            <h5 class="card-header"><?= $data['diagnosis'][0]['namaumum_fobia']; ?></h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title">Tingkat Keyakinan</h5>
                                        <p class="card-text" style="font-size: 50px;;"><?= $data['tingkat_keyakinan']; ?>%</p>
                                    </div>
                                    <div class="col">
                                        <h5 class="card-title">Solusi Pengobatan</h5>
                                        <p class="card-text"><?= $data['diagnosis'][0]['solusi_fobia']; ?></p>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="collapse" id="gejalaTerpilih">
                                        <div class="col">
                                            <h5>Jawaban Pengguna</h5>
                                            <table class="table" id="table_jawaban_user">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Nomor</th>
                                                        <th scope="col">Gejala</th>
                                                        <th scope="col">Jawaban</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data['rule_gejala_terpilih'] as $indeks => $gejala) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $indeks + 1; ?></th>
                                                            <td><?= $gejala['pertanyaan_gejala']; ?></td>
                                                            <td><?= $gejala['bobot_user']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col">
                                            <h5>Ketentuan Pakar</h5>
                                            <table class="table" id="table_jawaban_user">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Gejala</th>
                                                        <th scope="col">Bobot Pakar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data['rule_fobia_terdiagnosis'] as $indeks => $rule) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $indeks + 1; ?></th>
                                                            <td><?= $rule['pertanyaan_gejala']; ?></td>
                                                            <td><?= $rule['bobot']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="btnSimpanKonsultasi" class="btn btn-success">
                                    Simpan
                                </button>
                                <a class="btn btn-primary" data-toggle="collapse" href="#gejalaTerpilih" role="button" aria-expanded="false" aria-controls="gejalaTerpilih">
                                    Penjelasan
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>