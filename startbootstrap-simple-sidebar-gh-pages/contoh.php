<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (your existing head content) ... -->
</head>
<body class="sb-nav-fixed">
    <!-- ... (your existing navbar and sidebar code) ... -->
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h2 class="mt-4">TABEL FASILITAS TEMPAT KULINER - KOTA PANGKALAN KERINCI (PUSAT)</h2>
                <div class="mb-4">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search term...">
                    <select id="searchCriteria" class="form-select mt-2">
                        <option value="all">Search All</option>
                        <option value="nama">Search by Name</option>
                        <option value="id_fasilitas">Search by ID</option>
                        <!-- Add more options for specific columns as needed -->
                    </select>
                </div>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Id_Fasilitas</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Food</th>
                            <th scope="col">Kategory</th>
                            <th scope="col">Rata-rata Harga</th>
                            <th scope="col">Delivery</th>
                            <th scope="col">Kartu Kredit</th>
                            <th scope="col">Indoor</th>
                            <th scope="col">Outdoor</th>
                            <th scope="col">Parkir</th>
                            <th scope="col">Wifi</th>
                            <th colspan="2"><center>Aksi</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                        $ambildata = mysqli_query($koneksi, "SELECT * FROM tbl_fasilitas1");
                        while ($tampil = mysqli_fetch_array($ambildata)) {
                            echo "
                            <tr>
                                <td>$no</td>
                                <td>$tampil[id_fasilitas]</td>
                                <td>$tampil[nama]</td>
                                <td>$tampil[food]</td>
                                <td>$tampil[kategory]</td>
                                <td>$tampil[rata_rata_harga]</td>
                                <td>$tampil[delivery]</td>
                                <td>$tampil[kartu_kredit]</td>
                                <td>$tampil[indoor]</td>
                                <td>$tampil[outdoor]</td>
                                <td>$tampil[parkir]</td>
                                <td>$tampil[wifi]</td>
                                <td><a href='fasilitas.php?kode=$tampil[id_fasilitas]'> Hapus</a></td>
                                <td><a href='edit-fasilitas.php?kode=$tampil[id_fasilitas]'> Ubah</a></td>
                            </tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <!-- ... (remaining code) ... -->
    <script>
        const searchInput = document.getElementById('searchInput');
        const searchCriteria = document.getElementById('searchCriteria');
        const dataTable = document.getElementById('dataTable').querySelector('tbody').children;

        searchInput.addEventListener('input', updateTable);

        searchCriteria.addEventListener('change', updateTable);

        function updateTable() {
            const searchText = searchInput.value.toLowerCase();
            const selectedCriteria = searchCriteria.value;

            for (let row of dataTable) {
                const rowData = row.getElementsByTagName('td');
                let visible = false;

                if (selectedCriteria === 'all') {
                    for (let cell of rowData) {
                        if (cell.textContent.toLowerCase().includes(searchText)) {
                            visible = true;
                            break;
                        }
                    }
                } else {
                    const columnIndex = selectedCriteria === 'id_fasilitas' ? 1 : 2; // Adjust column index based on selected criteria
                    if (rowData[columnIndex].textContent.toLowerCase().includes(searchText)) {
                        visible = true;
                    }
                }

                row.style.display = visible ? 'table-row' : 'none';
            }
        }
    </script>
</body>
</html>
