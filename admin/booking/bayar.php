<?php

require '../../koneksi/koneksi.php';
$title_web = 'Konfirmasi';
include '../header.php';
session_start();
if (empty($_SESSION['USER'])) {
    echo '<script>alert("login dulu");window.location="index.php"</script>';
}

if (!empty($_GET['id'])) {
    $kode_booking = $_GET['id'];

    try {
        $hasil = $koneksi->query("SELECT * FROM booking WHERE kode_booking = '$kode_booking'")->fetch();

        $id_booking = $hasil['id_booking'];
        $id = $hasil['id_mobil'];
        $isi = $koneksi->query("SELECT * FROM mobil WHERE id_mobil = '$id'")->fetch();
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
}

?>
<br>
<br>
<div class="container">
    <div class="row">

        <?php if (!empty($_GET['id'])) { ?>
            <div class="col-sm-4">

                <br />
                <div class="card">
                    <div class="card-header">
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
                    <div class="card-header">
                        <h5 class="card-title">Detail Booking & Status Mobil</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="proses.php?id=konfirmasi">
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
                                    <td>Total Harga</td>
                                    <td>:</td>
                                    <td><input type="text" name="total_harga" id="" required class="form-control" placeholder="Total Harga" value="<?php echo $hasil['total_harga']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Waktu Berangkat</td>
                                    <td>:</td>
                                    <td><input type="time" name="go_time" id="" required class="form-control" placeholder="Go-Time"></td>
                                </tr>
                                <tr>
                                    <td><em>Status Booking</em></td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control" name="status_booking">
                                            <option>Pilih Status Booking</option>
                                            <option <?php if ($hasil['status_booking'] == 'terlayani') {
                                                        echo 'selected';
                                                    } ?>>
                                                Terlayani
                                            </option>
                                            <option <?php if ($hasil['status_booking'] == 'cancel') {
                                                        echo 'selected';
                                                    } ?>>
                                                Cancel
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control" name="status_konfirmasi">
                                            <option>Pilih Status</option>
                                            <option <?php if ($hasil['konfirmasi_booking'] == 'Sedang di proses') {
                                                        echo 'selected';
                                                    } ?>>
                                                Sedang di proses
                                            </option>
                                            <option <?php if ($hasil['konfirmasi_booking'] == 'Booking di terima') {
                                                        echo 'selected';
                                                    } ?>>
                                                Booking di terima
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status Mobil</td>
                                    <td> :</td>
                                    <td>
                                        <select class="form-control" name="status_mobil">
                                            <option>Pilih Status Mobil</option>
                                            <option <?php if ($isi['status_mobil'] == 'Tersedia') {
                                                        echo 'selected';
                                                    } ?> value="Tersedia">
                                                Tersedia ( Kembali )
                                            </option>
                                            <option <?php if ($isi['status_mobil'] == 'Tidak Tersedia') {
                                                        echo 'selected';
                                                    } ?> value="Tidak Tersedia">
                                                Tidak Tersedia ( Pinjam )
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <input type="hidden" name="id_booking" value="<?php echo $id_booking; ?>">
                            <input type="hidden" name="id_mobil" value="<?php echo $isi['id_mobil']; ?>">
                            <hr />
                            <button type="submit" class="btn btn-primary float-right">
                                Ubah Status
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<br>
<br>
<br>
<?php include '../footer.php'; ?>