<?php
    include "koneksi.php";

    // Validate and sanitize input to prevent SQL injection
    $kode = mysqli_real_escape_string($koneksi, $_GET['kode']);
    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_data WHERE id='$kode'");
    $data = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Simple Sidebar - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <style>
            #map{
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="listdata.php">Data</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">User</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="https://wa.me/6285215890920">Helpdesk</a>
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
                                <!-- <li class="nav-item"><a class="nav-link" href="#!">Sosmed</a></li> -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sosmed</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="https://www.facebook.com/">Facebook</a>
                                        <a class="dropdown-item" href="https://www.instagram.com/">Instagram</a>
                                        <!-- <div class="dropdown-divider"></div> -->
                                        <a class="dropdown-item" href="#!">Tiktok</a>
                                    </div>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Masuk</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Login</a>
                                        <a class="dropdown-item" href="#!">Registrasi</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                
                <!-- Page content-->
                <div class="container-fluid">
                    <h2 class="mt-4">Ubah Data</h2>
                    <form action="" method="post">
                    <table>
                        <tr>
                            <td width ="130">Layanan Kesehatan</td>
                            <td> <input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
                        </tr>
                        <tr>
                            <td width ="130">Alamat</td>
                            <td> <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></td>

                        </tr>
                        <tr>
                            <td width ="130">Website</td>
                            <td> <input type="text" name="website" value="<?php echo $data['website']; ?>"></td>
                        </tr>
                        <tr>
                            <td width ="130">Latitude</td>
                            <td> <input type="text" name="latitude"  value="<?php echo $data['latitude']; ?>"></td>
                        </tr>
                        <tr>
                            <td width ="130">Longitude</td>
                            <td> <input type="text" name="longitude" value="<?php echo $data['longitude']; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> <input type="submit" value="simpan" name="proses"></td>
                        </tr>
                    </table>
                </form>
                <?php
    if (isset($_POST['proses'])) {
        // Validate and sanitize inputs to prevent SQL injection
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
        $website = mysqli_real_escape_string($koneksi, $_POST['website']);
        $latitude = mysqli_real_escape_string($koneksi, $_POST['latitude']);
        $longitude = mysqli_real_escape_string($koneksi, $_POST['longitude']);

        $update_query = "UPDATE tbl_data SET
            nama = '$nama',
            alamat = '$alamat',
            website = '$website',
            latitude = '$latitude',
            longitude = '$longitude'
            WHERE id = '$kode'";

        if (mysqli_query($koneksi, $update_query)) {
            echo "Data baru telah tersimpan";
            echo "<meta http-equiv=refresh content=1; URL='tambah-data.php'>";
        } else {
            // Handle the error
            echo "Error updating data: " . mysqli_error($koneksi);
        }
    }
?>