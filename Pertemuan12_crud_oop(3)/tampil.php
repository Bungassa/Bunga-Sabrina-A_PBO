<?php
session_start();
include('koneksi.php');
$db = new database();

// ✅ Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Data Barang</title>
    <style type="text/css">
        .navbar {
    width: 100%;
    background: #2A72D4;
    padding: 12px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
    font-size: 15px;
    margin-bottom: 20px;
}

.navbar .logo {
    font-weight: bold;
    font-size: 17px;
}

.navbar a {
    color: white !important;
    text-decoration: none;
    margin-left: 18px;
    font-size: 14px;
}

.navbar a:hover {
    text-decoration: underline;
}

        form#background_border {
            margin: 0px 500px;
            color: black;
        }

        form#print_satuan {
            margin: 0px 250px;
            color: white;
        }

        .posisi_tombol {
            margin: 0px 200px;
        }

        .tombol_login {
            background: #47C0DB;
            color: white;
            font-size: 11pt;
            border: none;
            padding: 5px 20px;
            cursor: pointer;
        }

        * {
            font-family: "Trebuchet MS";
        }
        h1 {
            text-transform: uppercase;
            color: #47C0DB;
        }
        table {
            border: solid 1px #DDDEEE;
            border-collapse: collapse;
            border-spacing: 0;
            width: 70%;
            margin: 10px auto 10px auto;
        }
        table thead th {
            background-color: #DDEFEF;
            border: solid 1px #DDDEEE;
            color: #3366BB;
            padding: 10px;
            text-align: left;
            text-shadow: 1px 1px 1px #fff;
        }
        table tbody td {
            border: solid 1px #DDDEEE;
            color: #333;
            padding: 10px;
            text-shadow: 1px 1px 1px #fff;
        }
        a {
            background-color: #47C0DB;
            color: #fff;
            padding: 7px 10px;
            text-decoration: none;
            font-size: 12px;
            border-radius: 4px;
        }
        a:hover {
            background-color: #36A6C2;
        }
    
    
    </style>

<script src="style/jquery-3.2.1.min.js"></script>
<script src="style/jquery.autocomplete.min.js"></script>

</head>

<body>
    <div class="navbar">
    <div class="nav-left">
        <span class="logo">APLIKASI DATA BARANG</span>
    </div>
    <div class="nav-right">
        <a href="tampil.php">Home</a>
        <a href="tambah_data.php">Kelola Data</a>
        <a href="proses_barang.php?action=logout">Logout</a>
    </div>
</div>


<form id="background_border" method="get">
    Cari berdasarkan :
    <select name="kriteria">
        <option value="kd_barang">Kode Barang</option>
        <option value="nama_barang">Nama Barang</option>
        <option value="stok">Stok</option>
        <option value="harga_beli">Harga Beli</option>
        <option value="harga_jual">Harga Jual</option>
    </select>
    <input type="text" name="cari" id="cari" placeholder="Cari Nama Barang" autocomplete="off">
    <input type="submit" class="tombol_login" value="Cari">
</form>

<br>

<div class="posisi_tombol">
    <a href="tambah_data.php">+ Tambah Data</a>
    <a href="cetak.php" target="_BLANK">Print Data Barang</a>
    <a href="proses_barang.php?action=logout" onclick="return confirm('Yakin ingin keluar?')">Keluar Aplikasi</a>
</div>

<center><h1>Data Barang</h1></center>

<table>
<thead>
    <tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Stok</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Gambar Produk</th>
        <th>Action</th>
    </tr>
</thead>

<tbody>
<?php
if(isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $kriteria = $_GET['kriteria'];
    $data_barang = $db->cari_data($cari, $kriteria);
} else {
    $data_barang = $db->tampil_data();
}

$no = 1;
if ($data_barang) {
    foreach($data_barang as $row) {
        $rupiah_harga_beli = "Rp " . number_format($row['harga_beli'], 2, ',', '.');
        $rupiah_harga_jual = "Rp " . number_format($row['harga_jual'], 2, ',', '.');
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['kd_barang']; ?></td>
        <td><?php echo $row['nama_barang']; ?></td>
        <td><?php echo $row['stok']; ?></td>
        <td><?php echo $rupiah_harga_beli; ?></td>
        <td><?php echo $rupiah_harga_jual; ?></td>
        <td style="text-align:center;">
            <img src="gambar/<?php echo $row['gambar_produk']; ?>" width="120" alt="Gambar">
        </td>
        <td>
            <a href="edit_data.php?id_barang=<?php echo $row['id_barang']; ?>&action=edit">Edit</a> 
            <a href="proses_barang.php?id_barang=<?php echo $row['id_barang']; ?>&action=delete" onclick="return confirm('Hapus data ini?')">Hapus</a>
        </td>
    </tr>
<?php
    }
} else {
    echo "<tr><td colspan='8' align='center'>Belum ada data</td></tr>";
}
?>
</tbody>
</table>

<?php
if(isset($_GET['cari'])) {
    echo "<center><b>Hasil pencarian untuk : </b>" . htmlspecialchars($_GET['cari']) . "</center>";
}
?>

<script>
$(function() {

    $("#cari").autocomplete({
        serviceUrl: "autocomplete.php",
        paramName: "keyword",
        dataType: "JSON",
        onSearchStart: function(params) {
            params.kriteria = $("select[name='kriteria']").val(); 
        },
        transformResult: function(response) {
            return {
                suggestions: $.map(response, function(item) {

                    let kriteria = $("select[name='kriteria']").val();

                    return { 
                        value: item[kriteria]  
                    };
                })
            };
        }
    });

});
</script>


</body>
</html>
