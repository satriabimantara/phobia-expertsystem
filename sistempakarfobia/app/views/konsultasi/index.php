<div class="container ">
    <div class="row justify-content-center">
        <div class="col service-panel">
            <div class="row">
                <div class="col">
                    <div class="alert alert-light d-flex justify-content-between" role="alert">
                        <h2 class="alert-heading">Konsultasi</h2>
                        <button class="btn btn-transparent btn-bersihkanSemua" role="button">
                            <i class="fa fa-eraser" aria-hidden="true"></i>&nbsp;Bersihkan Semua
                        </button>
                    </div>
                </div>
            </div>
            <form action="<?= BASEURL; ?>konsultasi/diagnosis" method="post">
                <div class="row">
                    <div class="col">
                        <table class="table table-hover" id="table_konsultasi">
                            <thead>
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Pertanyaan</th>
                                    <th scope="col">Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['daftar_gejala'] as $indeks => $gejala) : ?>
                                    <tr>
                                        <th scope="row"><?= $indeks + 1; ?></th>
                                        <td><?= $gejala['pertanyaan_gejala']; ?></td>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control jawabanPertanyaan" name="<?= $gejala['kode_gejala']; ?>">
                                                    <option value="0">Tidak</option>
                                                    <option value="0.2">Tidak tahu</option>
                                                    <option value="0.4">Mungkin</option>
                                                    <option value="0.6">Kemungkinan benar</option>
                                                    <option value="0.8">Hampir pasti</option>
                                                    <option value="1">Pasti</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <button class="btn btn-primary rounded justify-content-center" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>