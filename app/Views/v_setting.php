<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }

            echo form_open('Admin/UpdateSetting') ?>
            <div class="form-group">
                <label>Nama</label>
                <input name="nama_masjid" value="<?= $setting['nama_masjid'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Kab/Kota</label>
                <select name="id_kota" class="form-control select2">
                    <?php foreach ($kota as $key => $kota) { ?>
                        <option value="<?= $kota['id'] ?>" <?= $kota['id'] == $setting['id_kota'] ? 'selected' : '' ?>><?= $kota['lokasi'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" value="<?= $setting['alamat'] ?>" class="form-control">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?= $setting['email'] ?>" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>No Telpon</label>
                        <input type="text" name="no_telpon" value="<?= $setting['no_telpon'] ?>" class="form-control" required>
                    </div>
                </div>
            </div>

            <button class="btn btn-success">Simpan</button>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

    });
</script>