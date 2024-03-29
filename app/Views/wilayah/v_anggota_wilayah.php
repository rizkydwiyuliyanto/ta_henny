<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah Wilayah
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
                <?php foreach ($wilayah as $key => $value) { ?>
                    <div class="col-md-6">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?= $value['nama_wilayah'] ?></h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah-anggota<?= $value['id_wilayah'] ?>"><i class="fas fa-plus"></i> Tambah Anggota
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
                                    $anggota = $db->table('tbl_anggota_wilayah')
                                        ->where('id_wilayah', $value['id_wilayah'])
                                        ->get()->getResultArray();
                                    $no = 1;

                                    foreach ($anggota as $key => $anggota) {
                                        $jabatan = $db->table('tbl_anggota_wilayah')
                                            ->where('id_wilayah', $anggota['id_wilayah'])
                                            ->select('tbl_anggota_wilayah.id_wilayah')
                                            ->get()->getRowArray();

                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $anggota['nama_anggota'] ?></td>
                                            <td><?= $anggota['jabatan'] ?></td>
                                            <td>
                                                <a href="<?= base_url('DataWilayah/DeleteAnggota/' . $value['id_tahun'] . '/' . $anggota['id_wilayah']) ?>" onclick="return confirm(' Hapus Anggota ?')">
                                                    <i class="fas fa-times text-danger"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>


                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-wilayah<?= $value['id_wilayah'] ?>"><i class="fas fa-trash"></i> Delete Wilayah
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
                <h4 class="modal-title">Tambah Wilayah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('DataWilayah/InsertWilayah') ?>
                <input value="<?= $thn['id_tahun'] ?>" name="id_tahun" hidden>
                <div class="form-group">
                    <label>Nama Wilayah</label>
                    <input class="form-control" name="nama_wilayah" required>
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

<?php foreach ($wilayah as $key => $value) { ?>
    <!-- /.modal-Delete-kelompok -->
    <div class="modal fade" id="delete-wilayah<?= $value['id_wilayah'] ?>">
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
                    <?= $value['nama_wilayah'] ?>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('DataWilayah/DeleteWilayah/' . $thn['id_tahun'] . '/' . $value['id_wilayah']) ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- /.modal-tambah-anggota -->
    <div class="modal fade" id="tambah-anggota<?= $value['id_wilayah'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Anggota <?= $value['nama_wilayah'] ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('DataWilayah/InsertAnggota') ?>
                    <input value="<?= $thn['id_tahun'] ?>" name="id_tahun" hidden>
                    <input value="<?= $value['id_wilayah'] ?>" name="id_wilayah" hidden>
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