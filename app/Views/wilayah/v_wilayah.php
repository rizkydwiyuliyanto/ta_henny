<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table" id="example1">
                <thead>
                    <tr>
                        <th width="50px">NO</th>
                        <th>Tahun</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($thn as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <?= $value['tahun'] ?> <?= date('Y') == $value['tahun'] ? ' <span class="right badge badge-success">Active</span>' : '' ?>
                            </td>
                            <td>
                                <a href="<?= base_url('DataWilayah/AnggotaWilayah/' . $value['id_tahun']) ?>" class="btn btn-flat btn-sm btn-primary"><i class="fas fa-layer-group"></i> Anggota Wilayah</a>
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