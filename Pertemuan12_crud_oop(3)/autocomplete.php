<?php
include "koneksi.php";
$db = new database();

header('Content-Type: application/json');

// ambil dari GET karena jQuery Autocomplete memakai GET
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$kriteria = isset($_GET['kriteria']) ? $_GET['kriteria'] : 'nama_barang';

// query
$query = mysqli_query($db->koneksi,
    "SELECT * FROM tb_barang WHERE $kriteria LIKE '%$keyword%'"
);

$data = [];

while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

echo json_encode($data);
?>
