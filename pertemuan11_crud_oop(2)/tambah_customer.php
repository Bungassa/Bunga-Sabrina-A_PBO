<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Customer</title>
</head>
<body>
    <h3>Tambah Data Customer</h3>
    <form action="proses_customer.php?action=add" method="post">
        <table>
            <tr>
                <td>ID Customer</td>
                <td><input type="text" name="id_customer" required></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td><input type="text" name="nik" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jk" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </td>
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
    <a href="cust.php"><button>Batal</button></a>
</body>
</html>