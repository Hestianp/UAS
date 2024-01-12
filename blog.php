<?php

session_start();
require 'koneksi/koneksi.php';
include 'header.php';
$hasil = $koneksi->query("SELECT mobil.merk, booking.* FROM booking JOIN mobil ON 
    booking.id_mobil=mobil.id_mobil ORDER BY id_booking DESC")->fetchAll();
?>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    Daftar Transaksi
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Kode Booking</th>
                                <th>Merk Mobil</th>
                                <th>NIK</th>
                                <th>Pemesan</th>
                                <th>Tanggal Pesan</th>
                                <th>Tanggal Pake</th>
                                <th>Lama Pake</th>
                                <th>Kota</th>
                                <th>Tujuan</th>
                                <th>Alamat</th>
                                <th>Jumlah Orang</th>
                                <th>Jumlah Barang</th>
                                <th>Go Time</th>
                                <th>Status Booking</th>
                                <th>Total Harga</th>
                                <th>Konfirmasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($hasil as $isi) { ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?= $isi['kode_booking']; ?></td>
                                    <td><?= $isi['merk']; ?></td>
                                    <td><?= $isi['nik']; ?></td>
                                    <td><?= $isi['pemesan']; ?></td>
                                    <td><?= $isi['tgl_pesan']; ?></td>
                                    <td><?= $isi['tgl_pake']; ?></td>
                                    <td><?= $isi['lama_pake']; ?> hari</td>
                                    <td><?= $isi['kota']; ?></td>
                                    <td><?= $isi['tujuan']; ?></td>
                                    <td><?= $isi['alamat']; ?></td>
                                    <td><?= $isi['jml_orang']; ?></td>
                                    <td><?= $isi['jml_barang']; ?></td>
                                    <td><?= $isi['go_time']; ?></td>
                                    <td><?= $isi['status_booking']; ?></td>
                                    <td>Rp. <?= number_format($isi['total_harga']); ?></td>
                                    <td><?= $isi['konfirmasi_pembayaran']; ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="bayar.php?id=<?= $isi['kode_booking']; ?>" role="button">Detail</a>
                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<br>

<br>


<?php include 'footer.php'; ?>