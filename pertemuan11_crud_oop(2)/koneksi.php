<?php
class database{

    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "belajar_oop2";
    var $koneksi = "";

    function __construct(){
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if(mysqli_connect_errno()){
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    function tampil_data(){
        $data = mysqli_query($this->koneksi, "select * from tb_barang");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function tambah_data($kode_barang, $nama_barang, $stok, $harga_beli, $harga_jual){
    mysqli_query($this->koneksi, 
        "INSERT INTO tb_barang (kode_barang, nama_barang, stok, harga_beli, harga_jual) 
         VALUES ('$kode_barang', '$nama_barang', '$stok', '$harga_beli', '$harga_jual')"
    );
}


    function tampil_edit_data($kd_barang){
        $data = mysqli_query($this->koneksi, "select * from tb_barang where id_barang='$kd_barang'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function edit_data($kd_barang,$nama_barang,$stok,$harga_beli,$harga_jual){
        mysqli_query($this->koneksi,"update tb_barang set nama_barang='$nama_barang', stok='$stok', harga_beli='$harga_beli', harga_jual='$harga_jual' where id_barang='$kd_barang'");
    }

    function delete_data($kd_barang){
        mysqli_query($this->koneksi,"delete from tb_barang where id_barang='$kd_barang'");
    }

    function kode_barang(){
        $data = mysqli_query($this->koneksi, "SELECT MAX(kode_barang) as kode_barang FROM tb_barang");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function cari_data($keyword){
    $data = mysqli_query($this->koneksi, "SELECT * FROM tb_barang WHERE nama_barang LIKE '%$keyword%'");
    $hasil = [];
    while($row = mysqli_fetch_array($data)){
        $hasil[] = $row;
    }
    return $hasil;
    }

    function tampil_customer(){
        $hasil = [];
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_customer");
        while($row = mysqli_fetch_assoc($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function tambah_customer($id_customer, $nik, $nama, $jk, $alamat, $telepon, $email, $password){
        mysqli_query($this->koneksi, 
            "INSERT INTO tb_customer (id_customer, nik_customer, nama_customer, jenis_kelamin, alamat_customer, telepon_customer, email_customer, pass_customer) 
             VALUES ('$id_customer', '$nik', '$nama', '$jk', '$alamat', '$telepon', '$email', '$password')"
        );
    }

    function tampil_edit_customer($id_customer){
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_customer WHERE id_customer='$id_customer'");
        return mysqli_fetch_assoc($data);
    }

    function edit_customer($id_customer, $nik, $nama, $jk, $alamat, $telepon, $email, $password){
        mysqli_query($this->koneksi,
            "UPDATE tb_customer SET 
                nik_customer='$nik', 
                nama_customer='$nama', 
                jenis_kelamin='$jk', 
                alamat_customer='$alamat',
                telepon_customer='$telepon',
                email_customer='$email',
                pass_customer='$password'
             WHERE id_customer='$id_customer'"
        );
    }

    function delete_customer($id_customer){
        mysqli_query($this->koneksi, "DELETE FROM tb_customer WHERE id_customer='$id_customer'");
    }

    function cari_customer($keyword){
        $hasil = [];
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_customer WHERE nama_customer LIKE '%$keyword%' OR id_customer LIKE '%$keyword%'");
        while($row = mysqli_fetch_assoc($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function tampil_supplier(){
        $hasil = [];
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_supplier");
        while($row = mysqli_fetch_assoc($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function tambah_supplier($id_supplier, $nama, $alamat, $telepon, $email, $password){
        mysqli_query($this->koneksi, 
            "INSERT INTO tb_supplier (id_supplier, nama_supplier, alamat_supplier, telepon_supplier, email_supplier, pass_supplier) 
             VALUES ('$id_supplier', '$nama', '$alamat', '$telepon', '$email', '$password')"
        );
    }

    function tampil_edit_supplier($id_supplier){
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_supplier WHERE id_supplier='$id_supplier'");
        return mysqli_fetch_assoc($data);
    }

    function edit_supplier($id_supplier, $nama, $alamat, $telepon, $email, $password){
        mysqli_query($this->koneksi,
            "UPDATE tb_supplier SET 
                nama_supplier='$nama', 
                alamat_supplier='$alamat', 
                telepon_supplier='$telepon', 
                email_supplier='$email', 
                pass_supplier='$password'
             WHERE id_supplier='$id_supplier'"
        );
    }

    function delete_supplier($id_supplier){
        mysqli_query($this->koneksi, "DELETE FROM tb_supplier WHERE id_supplier='$id_supplier'");
    }

    function cari_supplier($keyword){
        $hasil = [];
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_supplier WHERE nama_supplier LIKE '%$keyword%' OR id_supplier LIKE '%$keyword%'");
        while($row = mysqli_fetch_assoc($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
}
?>