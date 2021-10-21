<div class="alert alert-primary d-flex justify-content-between" role="alert">
    <h4 class="alert-heading">Rule Fobia Gejala</h4>
    <button class="btn btn-transparent btn-tambahRuleFobiaGejala" data-toggle="modal" data-target="#modalRuleFobiaGejala" role="button">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Tambah Rule Fobia Gejala
    </button>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table class="table table-hover" id="table_daftarrule">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama Fobia</th>
                        <th scope="col">Kode Gejala</th>
                        <th scope="col">Nama Gejala</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['rule_fobia_gejala'] as $index => $rule) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1; ?></th>
                            <td><?= $rule['namaumum_fobia']; ?></td>
                            <td><?= $rule['kode_gejala']; ?></td>
                            <td><?= $rule['nama_gejala']; ?></td>
                            <td><?= $rule['bobot']; ?></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-warning btn-sm btn-ubahRule" title="Edit Rule Fobia Gejala" data-toggle="modal" data-target="#modalRuleFobiaGejala" data-id="<?= $rule['id_detailfobia'] ?>">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                    <a class="btn btn-danger btn-sm" href="<?= BASEURL; ?>gejala/hapus_rule/<?= $rule['id_detailfobia'] ?>" onclick="return confirm('Hapus Data Rule Fobia Gejala ini?');" title="Hapus Rule Fobia Gejala">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal for rule fobia gejala -->
<form action="<?= BASEURL; ?>gejala/tambah_rulefobiagejala" method="post" id="formRuleFobiaGejala">
    <div class="modal fade" id="modalRuleFobiaGejala" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalRuleFobiaGejalaTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRuleFobiaGejalaTitle">Tambah Rule Fobia Gejala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_detailfobia" id="id_detailfobia" value="">

                    <div class="form-group">
                        <label for="id_fobia">Gangguan Fobia</label>
                        <select class="form-control" id="id_fobia" name="id_fobia" required="true">
                            <option value="">-Gangguan Fobia-</option>
                            <?php foreach ($data['daftar_fobia'] as $index => $fobia) : ?>
                                <option value="<?= $fobia['id_fobia']; ?>">
                                    <?= $index + 1; ?>).
                                    <?= $fobia['namaumum_fobia']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_gejala">Gejala</label>
                        <select class="form-control" id="id_gejala" name="id_gejala" required="true">
                            <option value="">- Daftar Gejala-</option>
                            <?php foreach ($data['daftar_gejala'] as $index => $gejala) : ?>
                                <option value="<?= $gejala['id_gejala']; ?>">
                                    <?= $index + 1; ?>).
                                    <?= $gejala['kode_gejala']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_gejala">Nama Gejala</label>
                        <textarea class="form-control" readonly="true" id=" nama_gejala" rows="6" name="nama_gejala"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="bobot_rule">Bobot</label>
                        <input type="number" class="form-control" id="bobot_rule" aria-describedby="bobotHelp" step="0.1" min="0" max="1" value="" name="bobot_rule">
                        <small id="bobotHelp" class="form-text text-muted">Masukkan bobot dalam rentang 0 - 1</small>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>