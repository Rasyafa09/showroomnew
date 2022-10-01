<?php
include 'koneksi.php';
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
    <link rel="stylesheet" href="style.css">
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
          <a href="dashboard.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Data Kawasaki<a href="datakawasaki.php"></a></span>
          </a>
        </li>
        <li>
          <a href="datascooter.php">
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
        <h2>data</h2>
    <a href="tambah.php">tambah</a>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Gambar</td>
            <td>Spesifikasi</td>
            <td>Aksi</td>
        </tr>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM tb_kawasaki");
        while($row = mysqli_fetch_array($query)){
        ?>

        <tr>
            <td><?php echo $row['id_gambar'] ?></td>
            <td><?php echo $row['nama'] ?></td>
            <td><img src="upload/<?php echo $row['file'] ?>" width="100px" heigth="100px"></td>
            <td><?php echo $row['spesifikasi']?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id_gambar'] ?>">edit</a>
                <a href="hapus.php?id=<?php echo $row['id_gambar'] ?>">hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
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