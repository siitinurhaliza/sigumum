<?php
// Sisipkan koneksi ke database jika belum ada
include "koneksi.php"; // Gantilah dengan file koneksi yang sesuai

if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];
    
    // Lakukan validasi akses ke item, misalnya berdasarkan hak akses pengguna
    // Anda perlu menambahkan validasi ini sesuai dengan logika bisnis Anda

    // Lakukan penghapusan item dengan SQL
    $query = "DELETE FROM tbl_data WHERE id = '$kode'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Jika penghapusan berhasil, arahkan kembali ke halaman data dengan pesan sukses
        echo '<script>alert("Data telah dihapus.");</script>';
        header("Location: data.php"); // Ganti dengan halaman yang sesuai
        exit();
    } else {
        // Jika penghapusan gagal, tampilkan pesan kesalahan
        echo '<script>alert("Gagal menghapus data.");</script>';
        header("Location: data.php"); // Ganti dengan halaman yang sesuai
        exit();
    }
} else {
    // Jika kode tidak ditemukan, arahkan kembali ke halaman data
    header("Location: data.php"); // Ganti dengan halaman yang sesuai
    exit();
}
?>
