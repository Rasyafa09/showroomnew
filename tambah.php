<?php
include 'koneksi.php'
?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="dashboard.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <span class="logo_name">Razz Store</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="datakawasaki.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Data Kawasaki<a href="datakawasaki.php"></a></span>
          </a>
        </li>
        <li>
          <a href="Stock.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Data Scooter<a href="datascooter.php"></a> </span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">Razzmotorcycles.com</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">

      <div class="sales-boxes">
        <div class="recent-sales box">
        <h2>input data </h2>
    <a href="data.php">tambah data</a>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>nama</td>
                <td>:</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>File</td>
                <td>:</td>
                <td><input type="file" name="gambar"></td>
            </tr>
            <tr>
                <td>Spesifikasi</td>
                <td>:</td>
                <td><input type="text" name="spesifikasi"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="kirim" value="kirim"></td>
            </tr>
        </table>
    </form>

    <?php
    if(isset($_POST['kirim'])){
        $nama = $_POST ['nama'];
        $nama_file = $_FILES['gambar']['name'];
        $spesifikasi = $_POST ['spesifikasi'];
        $source = $_FILES['gambar']['tmp_name'];
        $folder = './upload/';

        move_uploaded_file($source,$folder.$nama_file);
        $insert = mysqli_query($conn, "INSERT INTO tb_kawasaki VALUES (
            NULL,
            '$nama',
            '$nama_file',
            '$spesifikasi')");

        if($insert){
            echo 'Berhasil Upload';
            header('location:data.php');
        }else{
            echo 'Gagal Upload';
        }
    }
    ?>
        </div>
      </div>
    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>