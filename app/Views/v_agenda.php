<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah
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

            <table class="table" id="example1">
                <thead>
                    <tr>
                        <th width="50px">NO</th>
                        <th width="20%">Nama Kegiatan</th>
                        <!-- <th>Isi Kegiatan</th> -->
                        <th>Slug Kegiatan</th>
                        <th>Tempat Kegiatan</th>
                        <th>Foto Kegiatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($agenda as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <p>
                                <h5><b><?= $value['nama_kegiatan'] ?></b></h5>
                                Tanggal : <?= $value['tanggal'] ?> <br>
                                Jam : <?= $value['jam'] ?> - Selesai
                                </p>
                            </td>
                            <!-- <td><?= $value['isi_kegiatan'] ?></td> -->
                            <td><?= $value['slug_kegiatan'] ?></td>
                            <td>
                                <?= $value['tempat_kegiatan'] ?>
                            </td>
                            <td>
                                <img src="<?= base_url('fotokegiatan/' . $value['foto_kegiatan']) ?>" class="img-circle" width="60px" height="60px">
                            </td>
                            <td>
                                <button class="btn btn-flat btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit<?= $value['id_agenda'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-flat btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete<?= $value['id_agenda'] ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- /.modal-tambah -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Agenda/InsertData') ?>

                <div class="form-group">
                    <label>Nama Kegiatan</label>
                    <input type="text" class="form-control" name="nama_kegiatan">
                </div>
                <div class="form-group">
                    <label>Isi Kegiatan</label>
                    <textarea id="summernote" name="isi_kegiatan" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="tanggal">
                </div>
                <div class="form-group">
                    <label>Jam</label>
                    <input type="time" class="form-control" name="jam">
                </div>
                <div class="form-group">
                    <label>Tempat Kegiatan</label>
                    <input type="text" class="form-control" name="tempat_kegiatan">
                </div>
                <div class="form-group">
                    <label>Foto Kegiatan</label>
                    <input type="file" class="form-control" name="foto_kegiatan">
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

<!-- /.modal-edit -->
<?php foreach ($agenda as $key => $value) { ?>
    <div class="modal fade" id="modal-edit<?= $value['id_agenda'] ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('Agenda/UpdateData/' . $value['id_agenda']) ?>
                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input type="text" class="form-control" value="<?= $value['nama_kegiatan'] ?>" name="nama_kegiatan">
                    </div>
                    <div class="form-group">
                        <label>Isi Kegiatan</label>
                        <textarea rows="6" name="isi_kegiatan" class="form-control"> <?= $value['isi_kegiatan'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" value="<?= $value['tanggal'] ?>" name="tanggal">
                    </div>
                    <div class="form-group">
                        <label>Jam</label>
                        <input type="time" value="<?= $value['jam'] ?>" class="form-control" name="jam">
                    </div>
                    <div class="form-group">
                        <label>Tempat Kegiatan</label>
                        <input type="text" value="<?= $value['tempat_kegiatan'] ?>" class="form-control" name="tempat_kegiatan">
                    </div>
                    <div class="form-group">
                        <label>Foto Kegiatan</label>
                        <input type="file" value="<?= $value['foto_kegiatan'] ?>" class="form-control" name="foto_kegiatan">
                    </div>
                    <div class="form-group">
                        <img src="<?= base_url('fotokegiatan/' . $value['foto_kegiatan']) ?>" id="gambar_load" width="80px" height="80px">
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

    <!-- /.modal-Delete -->
    <div class="modal fade" id="modal-delete<?= $value['id_agenda'] ?>">
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
                    <b><?= $value['nama_kegiatan'] ?></b>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('Agenda/DeleteData/' . $value['id_agenda']) ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>

<!-- Summernote -->
<script src="<?= base_url('AdminLTE') ?>/plugins/summernote/summernote-bs4.min.js"></script>

<!-- Page specific script -->
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()
    })
</script>