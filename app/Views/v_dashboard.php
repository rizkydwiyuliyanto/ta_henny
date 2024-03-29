<?php
if ($kas_i == null) {
    $pemasukan_m[] = 0;
    $pengeluaran_m[] = 0;
} else {
    foreach ($kas_i as $key => $value) {
        $pemasukan_m[] = $value['kas_masuk'];
        $pengeluaran_m[] = $value['kas_keluar'];
    }
}
$saldo_i = array_sum($pemasukan_m) - array_sum($pengeluaran_m);

if ($kas_s == null) {
    $pemasukan_s[] = 0;
    $pengeluaran_s[] = 0;
} else {
    foreach ($kas_s as $key => $value) {
        $pemasukan_s[] = $value['kas_masuk'];
        $pengeluaran_s[] = $value['kas_keluar'];
    }
}
$saldo_s = array_sum($pemasukan_s) - array_sum($pengeluaran_s);

?>

<?php
if (session()->get('level') == 1) { ?>
    <div class="col-lg-6 col-12">
        <div class="small-box bg-primary">
            <div class="inner">
                <h4>Saldo Kas Rumah Tongkonan</h4>
                <h3>Rp. <?= number_format($saldo_i, 0) ?>,-</h3>
            </div>
            <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <a href="<?= base_url('Kasikt') ?>" class="small-box-footer">Rincian <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <div class="small-box bg-success">
            <div class="inner">
                <h4>Saldo Kas Ibadah</h4>
                <h3>Rp. <?= number_format($saldo_s, 0) ?>,-</h3>
            </div>
            <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <a href="<?= base_url('Kasibadah') ?>" class="small-box-footer">Rincian <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Rekap Kas Rumah Tongkonan Bulan <?= date('M Y') ?></h3>
            </div>
            <div class="card-body">
                <table class="table text-sm">
                    <thead>
                        <tr class="text-center">
                            <th width="50px">NO</th>
                            <th width="100px">Tanggal</th>
                            <th>Keterangan</th>
                            <th>Kas Masuk</th>
                            <th>Kas Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kasikt as $key => $value) { ?>
                            <tr class="<?= $value['status'] == 'Masuk' ? 'text-success' : 'text-danger' ?>">
                                <td><?= $no++ ?></td>
                                <td><?= $value['tanggal'] ?></td>
                                <td><?= $value['ket'] ?></td>
                                <td class="text-right">Rp. <?= number_format($value['kas_masuk'], 0) ?></td>
                                <td class="text-right">Rp. <?= number_format($value['kas_keluar'], 0) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Rekap Kas Ibadah Bulan <?= date('M Y') ?></h3>
            </div>
            <div class="card-body">
                <table class="table text-sm">
                    <thead>
                        <tr class="text-center">
                            <th width="50px">NO</th>
                            <th width="100px">Tanggal</th>
                            <th>Keterangan</th>
                            <th>Kas Masuk</th>
                            <th>Kas Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kasibadah as $key => $value) { ?>
                            <tr class="<?= $value['status'] == 'Masuk' ? 'text-success' : 'text-danger' ?>">
                                <td><?= $no++ ?></td>
                                <td><?= $value['tanggal'] ?></td>
                                <td><?= $value['ket'] ?></td>
                                <td class="text-right">Rp. <?= number_format($value['kas_masuk'], 0) ?></td>
                                <td class="text-right">Rp. <?= number_format($value['kas_keluar'], 0) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>Wilayah</h3>
                <p>Data Wilayah IKT</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="<?= base_url('DataWilayah') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>Kerukunan</h3>

                <p>Data Kerukunan IKT</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="<?= base_url('DataKerukunan') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>Kegiatan</h3>

                <p>Data Kegiatan IKT</p>
            </div>
            <div class="icon">
                <i class="ion ion-document"></i>
            </div>
            <a href="<?= base_url('Agenda') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>Donasi</h3>

                <p>Data Donasi IKT</p>
            </div>
            <div class="icon">
                <i class="fas fa-hand-holding-usd"></i>
            </div>
            <a href="<?= base_url('Admin/DonasiMasuk') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
<?php } else { ?>

    <div class="col-lg-6 col-12">
        <div class="small-box bg-primary">
            <div class="inner">
                <h4>Saldo Kas Rumah Tongkonan</h4>
                <h3>Rp. <?= number_format($saldo_i, 0) ?>,-</h3>
            </div>
            <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <a href="<?= base_url('Kasikt') ?>" class="small-box-footer">Rincian <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <div class="small-box bg-success">
            <div class="inner">
                <h4>Saldo Kas Ibadah</h4>
                <h3>Rp. <?= number_format($saldo_s, 0) ?>,-</h3>
            </div>
            <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <a href="<?= base_url('KasIbadah') ?>" class="small-box-footer">Rincian <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-6 col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Rekap Kas Rumah Tongkonan Bulan <?= date('M Y') ?></h3>
            </div>
            <div class="card-body">
                <table class="table text-sm">
                    <thead>
                        <tr class="text-center">
                            <th width="50px">NO</th>
                            <th width="100px">Tanggal</th>
                            <th>Keterangan</th>
                            <th>Kas Masuk</th>
                            <th>Kas Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kasikt as $key => $value) { ?>
                            <tr class="<?= $value['status'] == 'Masuk' ? 'text-success' : 'text-danger' ?>">
                                <td><?= $no++ ?></td>
                                <td><?= $value['tanggal'] ?></td>
                                <td><?= $value['ket'] ?></td>
                                <td class="text-right">Rp. <?= number_format($value['kas_masuk'], 0) ?></td>
                                <td class="text-right">Rp. <?= number_format($value['kas_keluar'], 0) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Rekap Kas Ibadah Bulan <?= date('M Y') ?></h3>
            </div>
            <div class="card-body">
                <table class="table text-sm">
                    <thead>
                        <tr class="text-center">
                            <th width="50px">NO</th>
                            <th width="100px">Tanggal</th>
                            <th>Keterangan</th>
                            <th>Kas Masuk</th>
                            <th>Kas Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kasibadah as $key => $value) { ?>
                            <tr class="<?= $value['status'] == 'Masuk' ? 'text-success' : 'text-danger' ?>">
                                <td><?= $no++ ?></td>
                                <td><?= $value['tanggal'] ?></td>
                                <td><?= $value['ket'] ?></td>
                                <td class="text-right">Rp. <?= number_format($value['kas_masuk'], 0) ?></td>
                                <td class="text-right">Rp. <?= number_format($value['kas_keluar'], 0) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>Donasi</h3>

                <p>Data Donasi IKT</p>
            </div>
            <div class="icon">
                <i class="fas fa-hand-holding-usd"></i>
            </div>
            <a href="<?= base_url('Bendahara/DonasiMasuk') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

<?php } ?>