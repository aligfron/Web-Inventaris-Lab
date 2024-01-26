<html>
<head><title>Home</title>
<link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <nav class="navbar navbar-light bg-primary ">
    <a class="navbar-brand" href="#"><strong>Inventaris Gudang BAROKAH</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="home.php?page=databarang"><strong>Home</a>
        <a class="nav-item nav-link" href="master_barang.php?page=peminjaman">Master Barang</a>
        <a class="nav-item nav-link" href="master_suplayer.php">Master Suplayer</a>
        <div class="nav-item dropdown bg-primary">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Transsaksi
        </a>
          <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="barang_masuk.php">Barang Masuk</a>
            <a class="dropdown-item" href="barang_keluar.php">Barang Keluar</a>
          </div>
        </div>
        <div class="nav-item dropdown bg-primary">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Laporan
        </a>
          <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="laporan_masuk.php">Laporan Barang Masuk</a>
            <a class="dropdown-item" href="laporan_keluar.php">Laporan Barang Keluar</a>
            <a class="dropdown-item" href="laporan_kartu_stok.php">Laporan Kartu Stok</a>
          </div>
        </div>
        <a class="nav-item nav-link" href="../logout.php">Logout</strong></a>
      </div>
          
    </div>

    </div>
  </nav>
<?php 
include "../config.php";
session_start();

    if(!isset($_SESSION['sts'])){
      echo"<script>alert('Anda Belum Login...!!!');</script>";
      echo"<meta http-equiv='refresh' content='0 url=../index.php'>";
    }else if($_SESSION['sts'] != "Admin"){
      echo"<script>alert('Anda Bukan Admin...!!!');</script>";
      echo"<meta http-equiv='refresh' content='0 url=../index.php'>";
    }
 ?>
<div class='container mt-3' 
style="background-color : rgba(167,167,167,0.3); 
     border-radius: 15px;
     padding: 15px;
     ">
  <br>
 <h3 align="center"><strong>Data Barang</strong></h3>

<?php 
echo $_SESSION['sts']; echo " : ";
echo $_SESSION['nama'];

 ?>
  <br>
 
 <table align="right"><tr>
 <td> <form class="form-inline" align="left" action="master_barang.php" method="get">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="cari">
          <button class="btn btn-success" type="submit">Search</button>
    </form>
    </table>
 <br><br>
<table border="2" width="100%" align="center">
  <tr align="center">
    <td><strong>No</td>
    <td><strong>Id</td>
    <td><strong>Nama Barang</td>
    <td><strong>Jenis Barang</td>
    <td><strong>Nama Supplier</td>
    <td><strong>Jumlah Stok</td>
    <td><strong>Kode Barang</td>
    <td><strong>Satuan</td>
    <td colspan="2"><strong>Action</td>
  </tr>
  <?php 
  $no = 1;
  if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  $sql = mysqli_query($koneksi, "select * from tb_barang where nama_barang like '%".$cari."%'");
   }else{
  $sql=mysqli_query($koneksi, "SELECT * FROM tb_barang");
}
  while($re = mysqli_fetch_array($sql)){

   ?>

  <tr>
    <td align="center"><?php echo $no++; ?></td>
    <td align="center"><?php echo $re['id_barang']; $kod = $re['id_barang']; ?></td>
    <td align="center"><?php echo $re['nama_barang']; ?></td>
    <td align="center"><?php echo $re['jenis']; ?></td>
    <td align="center"><?php echo $re['nama_supplier']; ?></td>
    <td align="center"><?php echo $re['stok']; ?></td>
    <td align="center"><?php echo $re['kode_barang']; ?></td>
    <td align="center"><?php echo $re['satuan']; ?></td>
    <td align="center"><?php echo "<a href='edit_data_barang.php?id=$kod' ><input class='btn btn-primary' type='button' value='Edit'></a>" ?></td>
    <td align="center"><?php echo "<a href='delete_data_barang.php?id=$kod'>
<button type='submit' class='btn btn-danger'>Delete</button></a>" ?></td>
    
  </tr>
    <?php } ?>

</table>

</div>
</body>

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
