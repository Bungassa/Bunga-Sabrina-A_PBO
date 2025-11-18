<?php
include('koneksi.php');
$db = new database();

$id_customer = $_GET['id'];
// Fungsi tampil_edit_customer di koneksi.php sudah mengembalikan satu baris, bukan array
$data_customer = $db->tampil_edit_customer($id_customer); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Customer</title>
</head>
<body>
    <h3>Edit Data Customer</h3>
    <form action="proses_customer.php?action=edit" method="post">
        <?php if($data_customer): // Memastikan data ditemukan ?>
        <input type="hidden" name="id_customer" value="<?php echo $data_customer['id_customer']; ?>">
        <table>
            <tr>
                <td>NIK</td>
                <td><input type="text" name="nik" value="<?php echo $data_customer['nik_customer']; ?>" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $data_customer['nama_customer']; ?>" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <?php $jk = $data_customer['jenis_kelamin']; ?>
                    <select name="jk" required>
                        <option value="Laki-laki" <?php if($jk == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if($jk == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $data_customer['alamat_customer']; ?>" required></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="telepon" value="<?php echo $data_customer['telepon_customer']; ?>" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?php echo $data_customer['email_customer']; ?>" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" value="<?php echo $data_customer['pass_customer']; ?>" required></td>
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
    <a href="cust.php"><button>Batal</button></a>
</body>
</html>