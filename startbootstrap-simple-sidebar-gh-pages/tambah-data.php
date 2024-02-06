<?php
include "koneksi.php";

if(isset($_POST['proses'])){
    mysqli_query($koneksi,"insert into tbl_data set
    nama = '$_POST[nama]',
    alamat = '$_POST[alamat]',
    website = '$_POST[website]',
    latitude = '$_POST[latitude]',
    longitude = '$_POST[longitude]'"
);

    echo "Data Berhasil Di Tambahkan";

    if(mysqli_affected_rows($koneksi) > 0) {
        header('Location: data.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>siti nurhaliza</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css
 integrity="sha512-MV7K8+y+gLIBoVD591QIYicR65iaqukzvf/nwasF0nqhPay5w/91JmvM2hMDcnK1OnMGCdVK+iQrJ71zPJQd1w==" 
 crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        #map {
            height: 80vh;
        }
        </style>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Pelalawan Sehat</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="data.php">Data</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="data.php">User</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="https://wa.me/68974395648">HelpDesk</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link Profil-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sosmed</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="https://sn613819@gmail.com">Gmail</a>
                                        <a class="dropdown-item" href="https://www.instagram.com/siitinrhlz/?igshid=NzZlODBkYWE4Ng%3D%3D">Instagram</a>
                                       
                                        <a class="dropdown-item" href="https://wa.me/68974395648">WhatsApp</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link Profil-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Login</a>
                                        <a class="dropdown-item" href="#!">Registrasi</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Log Out</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
        <h3 class="mt-4">Tambah Data</h3>
        <?php
        if (!empty($pesan)) {
            // Tampilkan pesan dengan Bootstrap Alert
            echo '<div class="alert alert-success" role="alert">' . $pesan . '</div>';
        }
        ?>
                <form action="" method="post" onsubmit="return konfirmasiData()">    
                        <table>
                            <tr>
                                <td width="130"> Layanan kesehatan</td>
                                <td> <input type="text" name="nama"> </td>
                            </tr>
                            <tr>
                                <td width="130"> Alamat</td>
                                <td> <input type = "text" name="alamat"> </td>
                            </tr>
                            <tr>
                                <td width="130"> Website</td>
                                <td> <input type = "text" name="website"> </td>
                            </tr>
                            <tr>
                                <td width="130"> latitude</td>
                                <td> <input type= "text" name="latitude"></td>
                            </tr>
                            <tr>
                                <td width="130"> longitude</td>
                                <td> <input type="text" name="longitude"> </td>
                             </tr>
                            <tr>
                            <button type="submit" class="btn btn-primary" name="proses">Simpan Data</button>
                            </tr>
                       </from>
                    
                </div>
            </div>
        </div>
        <script>
        function konfirmasiData() {
            var konfirmasi = confirm("Apakah data sudah benar? Data tidak dapat diubah setelah disimpan.");
            return konfirmasi;
        }
    </script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>


