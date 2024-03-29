<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah Kerukunan
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
            <div class="row">
                <?php foreach ($kerukunan as $key => $value) { ?>
                    <div class="col-md-6">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?= $value['nama_kerukunan'] ?></h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah-anggota<?= $value['id_kerukunan'] ?>"><i class="fas fa-plus"></i> Tambah Anggota
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Anggota</th>
                                        <th>Jabatan</th>
                                        <th></th>
                                    </tr>
                                    <?php
                                    $db = \Config\Database::connect();
                                    $anggota = $db->table('tbl_anggota_kerukunan')
                                        ->where('id_kerukunan', $value['id_kerukunan'])
                                        ->get()->getResultArray();
                                    $no = 1;

                                    foreach ($anggota as $key => $anggota) {
                                        $jabatan = $db->table('tbl_anggota_kerukunan')
                                            ->where('id_kerukunan', $anggota['id_kerukunan'])
                                            ->select('tbl_anggota_kerukunan.id_kerukunan')
                                            ->get()->getRowArray();

                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $anggota['nama_anggota'] ?></td>
                                            <td><?= $anggota['jabatan'] ?></td>
                                            <td>
                                                <a href="<?= base_url('DataKerukunan/DeleteAnggota/' . $value['id_tahun'] . '/' . $anggota['id_kerukunan']) ?>" onclick="return confirm(' Hapus Anggota ?')">
                                                    <i class="fas fa-times text-danger"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>


                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-kerukunan<?= $value['id_kerukunan'] ?>"><i class="fas fa-trash"></i> Delete Kerukunan
                                </button>
                            </div>

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                <?php  } ?>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- /.modal-tambah-kelompok -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kerukunan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('DataKerukunan/InsertKerukunan') ?>
                <input value="<?= $thn['id_tahun'] ?>" name="id_tahun" hidden>
                <div class="form-group">
                    <label>Nama Kerukunan</label>
                    <input class="form-control" name="nama_kerukunan" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php foreach ($kerukunan as $key => $value) { ?>
    <!-- /.modal-Delete-kelompok -->
    <div class="modal fade" id="delete-kerukunan<?= $value['id_kerukunan'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Ingin Hapus Data ? <br>
                    <?= $value['nama_kerukunan'] ?>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('DataKerukunan/DeleteKerukunan/' . $thn['id_tahun'] . '/' . $value['id_kerukunan']) ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- /.modal-tambah-anggota -->
    <div class="modal fade" id="tambah-anggota<?= $value['id_kerukunan'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Anggota <?= $value['nama_kerukunan'] ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('DataKerukunan/InsertAnggota') ?>
                    <input value="<?= $thn['id_tahun'] ?>" name="id_tahun" hidden>
                    <input value="<?= $value['id_kerukunan'] ?>" name="id_kerukunan" hidden>
                    <div class="form-group">
                        <label>Nama Anggota</label>
                        <input class="form-control" name="nama_anggota" required>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="jabatan" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="Ketua">Ketua</option>
                            <option value="Anggota">Anggota</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <?php echo form_close() ?>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>