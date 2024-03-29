<?php
if ($kas == null) {
    $pemasukan[] = 0;
    $pengeluaran[] = 0;
} else {
    foreach ($kas as $key => $value) {
        $pemasukan[] = $value['kas_masuk'];
        $pengeluaran[] = $value['kas_keluar'];
    }
}
?>
<center>
    <img src="<?= base_url('template/assets/img/ikt.png') ?>" style="width: 10%;">
    <h3> <b> IKATAN KELUARGA TORAJA </b></h3>
</center>

<b>Bulan : <?= $bulan ?></b> <br>
<b>Tahun : <?= $tahun ?></b>
<center>
    <table class="table table-bordered" border="1px solid">

        <tr class="text-center">
            <th width="50px">NO</th>
            <th width="100px">Tanggal</th>
            <th>Keterangan</th>
            <th>Kas Masuk</th>
            <th>Kas Keluar</th>
        </tr>

        <?php $no = 1;
        foreach ($kas as $key => $value) { ?>
            <tr class="<?= $value['status'] == 'Masuk' ? 'text-success' : 'text-danger' ?>">
                <td class="text-center"><?= $no++ ?></td>
                <td><?= $value['tanggal'] ?></td>
                <td><?= $value['ket'] ?></td>
                <td class="text-right">Rp. <?= number_format($value['kas_masuk'], 0) ?></td>
                <td class="text-right">Rp. <?= number_format($value['kas_keluar'], 0) ?></td>
            </tr>
        <?php } ?>
        <tr>
            <th colspan="3">Total</th>
            <th class="text-success text-right">Rp. <?= number_format(array_sum($pemasukan), 0) ?></th>
            <th class="text-danger text-right">Rp. <?= number_format(array_sum($pengeluaran), 0) ?></th>
        </tr>
    </table>
</center>
<br>
<br>
<br>
<table width="100%">
    <tr>
        <td></td>
        <td width="200px">
            <p>Jayapura, <?php echo date("d M Y") ?> <br> Ketua, Ikatan Keluarga Toraja</p>
            <br>
            <br>
            <p>____________________________</p>
        </td>
    </tr>
</table>