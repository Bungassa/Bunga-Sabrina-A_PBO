<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Supplier</title>
</head>
<body>
    <h3>Tambah Data Supplier</h3>
    <form action="proses_supplier.php?action=add" method="post">
        <table>
            <tr>
                <td>ID Supplier</td>
                <td><input type="text" name="id_supplier" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" required></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="telepon" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
    <a href="supp.php"><button>Batal</button></a>
</body>
</html>