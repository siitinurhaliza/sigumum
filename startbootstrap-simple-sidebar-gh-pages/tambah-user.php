<?php
include "koneksi.php";

if(isset($_POST['proses'])){
    mysqli_query($koneksi,"insert into tbl_data set
    nama = '$_POST[nama]',
    alamat = '$_POST[alamat]',
    sosmed = '$_POST[sosmed]',
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
        <title>Sistem informasi geografis Layanan Pendidikan</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">SIG Layanan Pendidikan</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="data.php">Data</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="data.php">Contact</a>
                    
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle"> Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Action</a>
                                        <a class="dropdown-item" href="#!">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Something else here</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <h3 class="mt-4">Tambah Data</h3>
                    <form action="" method="post">
                        <table>
                            <tr>
                                <td width="130"> Layanan Sekolah</td>
                                <td> <input type="text" name="nama"> </td>
                            </tr>
                            <tr>
                                <td width="130"> Alamat</td>
                                <td> <input type = "text" name="alamat"> </td>
                            </tr>
                            <tr>
                                <td width="130"> Sosmed</td>
                                <td> <input type = "text" name="sosmed"> </td>
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
                                <td></td>
                                <td> <input type="submit" values="simpan" name="proses"></td>
                            </tr>
                       </from>
                    
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>


