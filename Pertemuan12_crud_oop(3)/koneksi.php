<?php
class database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "belajar_oop3";
    public $koneksi = "";

    function __construct() {
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if(mysqli_connect_error()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    public function tampil_data() {
        $data = mysqli_query($this->koneksi, "select * from tb_barang");
        while($row = mysqli_fetch_array($data)){
        $hasil[] = $row;
        }
        return $hasil;
    }

    public function kode_barang() {
    $query = mysqli_query($this->koneksi, "SELECT max(kd_barang) as kodeTerbesar FROM tb_barang");
    $data = mysqli_fetch_array($query);
    $kodeBarang = $data['kodeTerbesar'];

    // ambil angka dari kode barang terbesar, misal BRG001 jadi 001
    $urutan = (int) substr($kodeBarang, 3, 3);

    // tambahkan 1
    $urutan++;

    // buat kode barang baru dengan format BRG dan 3 digit angka
    $huruf = "BRG";
    $kodeBarang = $huruf . sprintf("%03s", $urutan);

    return $kodeBarang;
    }


    // Fungsi untuk print data satuan
    function satuan_print($nama_barang) {
    $data = mysqli_query($this->koneksi, "SELECT * FROM tb_barang WHERE nama_barang = '$nama_barang'");
    $hasil = [];
    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }
    return $hasil;
    }

    // Fungsi login
    function login($username, $password) {
    session_start();
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($this->koneksi, $query);
    
    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $data['username'];
        $_SESSION['status'] = "login";
        header("location:tampil.php");
    } else {
        echo "<script>alert('Username atau password salah!');window.location='login.php'</script>";
    }
    }

    // Fungsi logout
    function logout() {
    session_start();
    session_destroy();
    header("location:login.php");
    }

    // Fungsi untuk mencari data berdasarkan kriteria
    function cari_data($cari, $kriteria) {
    $query = "SELECT * FROM tb_barang WHERE $kriteria LIKE '%$cari%'";
    $result = mysqli_query($this->koneksi, $query);

    $hasil = [];
    while($row = mysqli_fetch_assoc($result)) {
        $hasil[] = $row;
    }
    return $hasil;
    }


    // Fungsi untuk tambah data (dengan/tanpa upload gambar)
    function tambah_data($kd_barang, $nama_barang, $stok, $harga_beli, $harga_jual, $gambar_produk) {
        // Cek dulu jika ada gambar produk jalankan coding tnt
        if($gambar_produk != "") {
            // ekstensi file gambar yang bisa diupload
            $ekstensi_diperbolehkan = array('png','jpg','jpeg'); 
            // memisahkan nama file dengan ekstensi yang diupload
            $x = explode('.', $gambar_produk); 
            $ekstensi = strtolower(end($x));
            // membuat nama file baru
            $file_tmp = $_FILES['gambar_produk']['tmp_name'];
            $angka_acak = rand(1,999);
            $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; 

            // pengecekan ekstensi file
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                // menggabungkan angka acak dengan nama file sebenarnya
                // memindahkan file gambar ke folder gambar
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); 
                  
                // query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena otomatis)
                $query = "INSERT INTO tb_barang (kd_barang, nama_barang, stok, harga_beli, harga_jual, gambar_produk) VALUES ('$kd_barang', '$nama_barang', '$stok', '$harga_beli', '$harga_jual', '$nama_gambar_baru')";
                $result = mysqli_query($this->koneksi, $query);

                // periksa query apakah ada error
                if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($this->koneksi)." - ".mysqli_error($this->koneksi));
                } else {
                    // tampil alert dan akan redirect ke halaman index.php
                    echo "<script>alert('Data berhasil ditambah.');window.location='tampil.php'</script>";
                }
            } else {
                // jika file ekstensi tidak jpg dan png maka alert tnt yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, jpeg atau png.');window.location='tambah_data.php'</script>";
            }
        } else {
            // jika tidak ada gambar maka akan menjalankan coding ini
            $query = "INSERT INTO tb_barang (id_barang, kd_barang, nama_barang, stok, harga_beli, harga_jual, gambar_produk) VALUES ('', '$kd_barang', '$nama_barang', '$stok', '$harga_beli', '$harga_jual', null)";
            $result = mysqli_query($this->koneksi, $query);

            // periksa query apakah ada error
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($this->koneksi)." - ".mysqli_error($this->koneksi));
            } else {
                // tampil alert dan akan redirect ke halaman index.php
                // ubah ganti index.php sesuai halaman yang akan dituju
                echo "<script>alert('Data berhasil ditambah.');window.location='tampil.php'</script>";
            }
        }
    }

// Fungsi untuk menampilkan data berdasarkan ID
    function tampil_edit_data($id_barang) {
        $data = mysqli_query($this->koneksi, "select * from tb_barang where id_barang='$id_barang'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    // Fungsi untuk mengedit data (dengan/tanpa upload gambar)
    function edit_data($id_barang, $nama_barang, $stok, $harga_beli, $harga_jual, $gambar_produk) {
        // jalankan apabila terdapat gambar edit yang di upload
        if($gambar_produk != "") {
            $ekstensi_diperbolehkan = array('png','jpg','jpeg');
            $x = explode('.', $gambar_produk);
            $ekstensi = strtolower(end($x));
            $file_tmp = $_FILES['gambar_produk']['tmp_name'];
            $angka_acak = rand(1,999);
            $nama_gambar_baru = $angka_acak.'-'.$gambar_produk;

            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                // menggabungkan angka acak dengan nama file sebenarnya
                // memindahkan file gambar ke folder gambar
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);

                // jalankan query UPDATE berdasarkan ID produknya utk edit
                $query = "UPDATE tb_barang SET nama_barang = '$nama_barang', stok = '$stok', harga_beli = '$harga_beli', harga_jual = '$harga_jual', gambar_produk = '$nama_gambar_baru' WHERE id_barang = '$id_barang'";
                $result = mysqli_query($this->koneksi, $query);

                // periksa query apakah ada error
                if(!$result){
                    die ("Query gagal dijalankan: ".mysqli_errno($this->koneksi)." - ".mysqli_error($this->koneksi));
                } else {
                    // tampil alert dan akan redirect ke halaman index.php
                    // silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil diubah.');window.location='tampil.php'</script>";
                }
            } else {
                // jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, jpeg atau png.');window.location='edit_data.php?;'</script>";
            }
        } else {
            // jalankan query UPDATE jika tidak ada gambar edit yg di upload
            $query = "UPDATE tb_barang SET nama_barang = '$nama_barang', stok = '$stok', harga_beli = '$harga_beli', harga_jual = '$harga_jual' WHERE id_barang = '$id_barang'";
            $result = mysqli_query($this->koneksi, $query);

            // periksa query apakah ada error
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($this->koneksi)." - ".mysqli_error($this->koneksi));
            } else {
                // tampil alert dan akan redirect ke halaman index.php
                // silahkan ganti index.php sesuai halaman yang akan dituju
                echo "<script>alert('Data berhasil diubah.');window.location='tampil.php'</script>";
            }
        }
    }

    // Fungsi untuk menghapus data
    function delete_data($id_barang) {
        mysqli_query($this->koneksi, "delete from tb_barang where id_barang='$id_barang'");
    }
}
?>