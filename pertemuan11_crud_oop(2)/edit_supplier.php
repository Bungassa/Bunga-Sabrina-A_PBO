<?php
include('koneksi.php');
$db = new database();

$id_supplier = $_GET['id'];
$data_supplier = $db->tampil_edit_supplier($id_supplier); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Supplier</title>
</head>
<body>
    <h3>Edit Data Supplier</h3>
    <form action="proses_supplier.php?action=edit" method="post">
        <?php if($data_supplier): // Memastikan data ditemukan ?>
        <input type="hidden" name="id_supplier" value="<?php echo $data_supplier['id_supplier']; ?>">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $data_supplier['nama_supplier']; ?>" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $data_supplier['alamat_supplier']; ?>" required></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="telepon" value="<?php echo $data_supplier['telepon_supplier']; ?>" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?php echo $data_supplier['email_supplier']; ?>" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" value="<?php echo $data_supplier['pass_supplier']; ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update"></td>
            </tr>
        </table>
        <?php else: ?>
            <p>Data tidak ditemukan.</p>
        <?php endif; ?>
    </form>
    <a href="supp.php"><button>Batal</button></a>
</body>
</html>