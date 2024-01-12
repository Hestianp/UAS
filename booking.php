<?php
/*
  | Source Code Aplikasi Rental Mobil PHP & MySQL
  | 
  | @package   : rental_mobil
  | @file	   : bookinh.php 
  | @author    : fauzan1892 / Fauzan Falah
  | @copyright : Copyright (c) 2017-2021 Codekop.com (https://www.codekop.com)
  | @blog      : https://www.codekop.com/products/source-code-aplikasi-rental-mobil-php-mysql-7.html 
  | 
  | 
  | 
  | 
 */

session_start();
require 'koneksi/koneksi.php';
include 'header.php';
if (empty($_SESSION['USER'])) {
  echo '<script>alert("Harap login !");window.location="index.php"</script>';
}
$id = $_GET['id'];
$isi = $koneksi->query("SELECT * FROM mobil WHERE id_mobil = '$id'")->fetch();
?>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="card">
        <img src="assets/image/<?php echo $isi['gambar']; ?>" class="card-img-top" style="height:200px;">
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
          <form method="post" action="koneksi/proses.php?id=booking">
            <div class="form-group">
              <label for="">NIK</label>
              <input type="text" name="nik" id="" required class="form-control" placeholder="NIK Anda">
            </div>
            <div class="form-group">
              <label for="">Pemesan</label>
              <input type="text" name="pemesan" id="" required class="form-control" placeholder="Nama Pemesan">
            </div>
            <div class="form-group ">
              <label for="">Tanggal Pesan</label>
              <input type="date" name="tgl_pesan" id="" required class="form-control" placeholder="Tanggal Pesan">
            </div>
            <div class="form-group">
              <label for="">Tanggal Pake</label>
              <input type="date" name="tgl_pake" id="" required class="form-control" placeholder="Tanggal Pake">
            </div>
            <div class="form-group">
              <label for="">Lama Pake</label>
              <input type="number" name="lama_pake" id="" required class="form-control" placeholder="Lama Pake">
            </div>
            <div class="form-group">
              <label for="">Kota</label>
              <input type="text" name="kota" id="" required class="form-control" placeholder="Nama Kota">
            </div>
            <div class="form-group">
              <label for="">Tujuan</label>
              <input type="text" name="tujuan" id="" required class="form-control" placeholder="Nama Kota Tujuan">
            </div>
            <div class="form-group">
              <label for="">Alamat</label>
              <input type="text" name="alamat" id="" required class="form-control" placeholder="alamat">
            </div>
            <div class="form-group">
              <label for="">Jumlah Orang</label>
              <input type="number" name="jml_orang" id="" required class="form-control" placeholder="Jumlah Orang">
            </div>
            <div class="form-group">
              <label for="">Jumlah Barang</label>
              <input type="number" name="jml_barang" id="" required class="form-control" placeholder="Jumlah Barang">
            </div>

            <input type="hidden" value="<?php echo $_SESSION['USER']['id_login']; ?>" name="id_login">
            <input type="hidden" value="<?php echo $isi['id_mobil']; ?>" name="id_mobil">
            <hr />
            <?php if ($isi['status_mobil'] == 'Tersedia') { ?>
              <button type="submit" class="btn btn-primary float-right">Booking Now</button>
            <?php } else { ?>
              <button type="submit" class="btn btn-danger float-right" disabled>Booking Now</button>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<br>

<br>

<br>


<?php include 'footer.php'; ?>