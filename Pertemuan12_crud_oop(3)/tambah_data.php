<?php
include('koneksi.php');
$db = new database();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
    form#background_border {
        margin: 0px 250px;
        color: black;
    }
    form.print_satuan {
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
    }
    </style>
    <style type="text/css">
    * {
        font-family: "Trebuchet MS";
    }
    h1 {
        text-transform: uppercase;
        color: #47C0DB;
    }
    table {
        border: solid 1px #DDEEEE;
        border-collapse: collapse;
        border-spacing: 0;
        width: 40%;
        margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    a {
        background-color: #47C0DB;
        color: #fff;
        padding: 7px;
        text-decoration: none;
        font-size: 12px;
    }
    </style>
</head>

<body>
<h3><center>Form Tambah Data Barang</center></h3>
<hr/>
<?php
    $kode_max = $db->kode_barang();
    $kode_barang_baru = 'BRG' . ($kode_max ? ((int) filter_var($kode_max, FILTER_SANITIZE_NUMBER_INT) + 1) : 1);
?>
<form method="post" action="proses_barang.php?action=add" enctype="multipart/form-data">
<table width="34%">
    <tr>
        <td width="40%">Kode Barang</td>
        <td width="2%">:</td>
        <td width="58%"><input type="text" name="kd_barang" value="<?php echo $kode_barang_baru; ?>" readonly/></td>
    </tr>
    <tr>
        <td>Nama Barang</td>
        <td>:</td>
        <td><input type="text" name="nama_barang" placeholder="Nama Barang"/></td>
    </tr>
    <tr>
        <td>Stok</td>
        <td>:</td>
        <td><input type="text" name="stok" placeholder="Stok"/></td>
    </tr>
    <tr>
        <td>Harga Beli</td>
        <td>:</td>
        <td><input type="text" name="harga_beli" placeholder="Harga Beli"/></td>
    </tr>
    <tr>
        <td>Harga Jual</td>
        <td>:</td>
        <td><input type="text" name="harga_jual" placeholder="Harga Jual"/></td>
    </tr>
    <tr>
        <td>Gambar Barang</td>
        <td>:</td>
        <td>
            <input type="file" name="gambar_produk" required="required"/>
            <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | </p>
        </td>
    </tr>
    <tr height="47">
        <td></td>
        <td></td>
        <td>
            <input type="submit" class="tombol_login" name="tombol" value="Simpan"/>
            <a href="tampil.php">Kembali</a>
        </td>
    </tr>
</table>
</form>
</body>
</html>