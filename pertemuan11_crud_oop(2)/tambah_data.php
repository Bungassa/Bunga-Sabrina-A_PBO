<?php
include('koneksi.php');
$db = new database();

$query = mysqli_query($db->koneksi, "SELECT MAX(kode_barang) AS kode_terakhir FROM tb_barang");
$data = mysqli_fetch_array($query);

if ($data && $data['kode_terakhir'] != '') {
    $kode_max = $data['kode_terakhir'];
    
    $urutan = (int)substr($kode_max, 3, 3);
    $urutan++;
    $kode_barangbaru = "BRG" . sprintf("%03s", $urutan);
} else {
    $kode_barangbaru = "BRG001";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h3>Form Tambah Data Barang</h3>
    <hr/>
    <?php
    ?>
    
    <form method="post" action="proses_barang.php?action=add">
    <table>
        <tr>
            <td>Kode Barang</td>
            <td>:</td>
            <td><input type="text" name="kd_barang" value="<?php echo $kode_barangbaru; ?>" readonly></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td>:</td>
            <td><input type="text" name="nama_barang"></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td>:</td>
            <td><input type="text" name="stok"></td>
        </tr>
        <tr>
            <td>Harga Beli</td>
            <td>:</td>
            <td><input type="text" name="harga_beli"></td>
        </tr>
        <tr>
            <td>Harga Jual</td>
            <td>:</td>
            <td><input type="text" name="harga_jual"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <input type="submit" name="tombol" value="Simpan">
                <a href="index.php"><input type="button" name="tombol" value="Kembali"></a>
            </td>
        </tr>
    </table>
    </form>
</body>
</html>