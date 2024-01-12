<?php

session_start();
require 'koneksi/koneksi.php';
include 'header.php';
if (empty($_SESSION['USER'])) {
    echo '<script>alert("Harap login !");window.location="index.php"</script>';
}
$kode_booking = $_GET['id'];
$hasil = $koneksi->query("SELECT * FROM booking WHERE kode_booking = '$kode_booking'")->fetch();

$id = $hasil['id_mobil'];
$isi = $koneksi->query("SELECT * FROM mobil WHERE id_mobil = '$id'")->fetch();


?>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-4">

            <br />
            <div class="card">
                <div class="card-body" style="background:#ddd">
                    <h5 class="card-title"><?php echo $isi['nama_mobil']; ?></h5>
                </div>
                <ul class="list-group list-group-flush">

                    <?php if ($isi['status_mobil'] == 'Tersedia') { ?>

                        <li class="list-group-item bg-primary text-white">
                            <i class="fa fa-check"></i> Available
                        </li>

                    <?php } else { ?>

                        <li class="list-group-item bg-danger text-white">
                            <i class="fa fa-close"></i> Not Available
                        </li>

                    <?php } ?>
                    <li class="list-group-item bg-info text-white"><i class="fa fa-check"></i> Free E-toll 50k</li>
                </ul>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Kode Booking</td>
                            <td> :</td>
                            <td><?php echo $hasil['kode_booking']; ?></td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td> :</td>
                            <td><?php echo $hasil['nik']; ?></td>
                        </tr>
                        <tr>
                            <td>Pemesan</td>
                            <td> :</td>
                            <td><?php echo $hasil['pemesan']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pesan</td>
                            <td> :</td>
                            <td><?php echo $hasil['tgl_pesan']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pake</td>
                            <td> :</td>
                            <td><?php echo $hasil['tgl_pake']; ?></td>
                        </tr>
                        <tr>
                            <td>Lama Pake</td>
                            <td>:</td>
                            <td><?php echo $hasil['lama_pake'] ?> hari</td>
                        </tr>
                        <tr>
                            <td>Kota</td>
                            <td>:</td>
                            <td><?php echo $hasil['kota'] ?></td>
                        </tr>
                        <tr>
                            <td>Tujuan</td>
                            <td>:</td>
                            <td><?php echo $hasil['tujuan'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?php echo $hasil['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Orang</td>
                            <td>:</td>
                            <td><?php echo $hasil['jml_orang'] ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Barang</td>
                            <td>:</td>
                            <td><?php echo $hasil['jml_barang'] ?></td>
                        </tr>
                        <tr>
                            <td>Konfirmasi Booking</td>
                            <td> :</td>
                            <td><?php echo $hasil['konfirmasi_booking']; ?></td>
                        </tr>
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