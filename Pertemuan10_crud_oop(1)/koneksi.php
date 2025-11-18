<?php
class database{

    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "belajar_oop";
    var $koneksi = null;
    
    function __construct()
    {
        $this->koneksi = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        if($this->koneksi->connect_error){
            echo "Koneksi database gagal : " . $this->koneksi->connect_error;
            // Hentikan eksekusi jika koneksi gagal
            die(); 
        }
        
        // Create 'user' table if not exists, matching the image structure
        $create_table_sql = "CREATE TABLE IF NOT EXISTS user (
            id_user INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            tipe_user VARCHAR(50) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        if (!$this->koneksi->query($create_table_sql)) {
            echo "Error creating table: " . $this->koneksi->error;
            die();
        }
        
        // Check and add kode_barang column to tb_barang if it doesn't exist
        $tableExists = $this->koneksi->query("SHOW TABLES LIKE 'tb_barang'");
        if ($tableExists && $tableExists->num_rows > 0) {
            $checkColumn = $this->koneksi->query("SHOW COLUMNS FROM tb_barang LIKE 'kode_barang'");
            if (!$checkColumn || $checkColumn->num_rows == 0) {
                $alterSql = "ALTER TABLE tb_barang ADD COLUMN kode_barang VARCHAR(50) NOT NULL DEFAULT '' AFTER id_barang";
                if (!$this->koneksi->query($alterSql)) {
                    echo "Error adding column: " . $this->koneksi->error;
                    die();
                }
            }
        }
    }

    // ... (Fungsi tampil_data, tambah_data, edit_data, delete_data, cari_data tetap sama) ...
    // ... (Saya sembunyikan agar fokus ke fungsi user) ...

    function tampil_data($search = null)
    {
        $sql = "select * from tb_barang";
        
        if ($search) {
            $sql .= " where nama_barang LIKE ?";
        }
        
        $stmt = $this->koneksi->prepare($sql);
        if (!$stmt) {
             echo "Error prepare: " . $this->koneksi->error;
             return [];
        }
        
        if ($search) {
            $searchTerm = "%" . $search . "%";
            $stmt->bind_param("s", $searchTerm);
        }
        
        if (!$stmt->execute()) {
            echo "Error execute: " . $stmt->error;
            return [];
        }
        
        $result = $stmt->get_result();
        $hasil = [];
        while ($row = $result->fetch_assoc()) {
            $hasil[] = $row;
        }
        $stmt->close();
        return $hasil;
    }

    function tambah_data($kode_barang, $nama_barang, $stok, $harga_beli, $harga_jual)
    {
        $stmt = $this->koneksi->prepare("insert into tb_barang (kode_barang, nama_barang, stok, harga_beli, harga_jual) values (?, ?, ?, ?, ?)");
        if (!$stmt) {
             echo "Error prepare: " . $this->koneksi->error;
             return;
        }

        $stmt->bind_param("ssidd", $kode_barang, $nama_barang, $stok, $harga_beli, $harga_jual);
        
        if (!$stmt->execute()) {
            echo "Error execute: " . $stmt->error;
        }
        
        $stmt->close();
    }

    function tampil_edit_data($id_barang)
    {
        $hasil = [];
        $stmt = $this->koneksi->prepare("select * from tb_barang where id_barang = ?");
        if (!$stmt) {
             echo "Error prepare: " . $this->koneksi->error;
             return $hasil;
        }
        
        $stmt->bind_param("i", $id_barang); // Asumsi id_barang adalah integer (i)
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            while ($d = $result->fetch_assoc()) {
                $hasil[] = $d;
            }
        } else {
            echo "Error execute: " . $stmt->error;
        }
        
        $stmt->close();
        return $hasil;
    }

    function edit_data($id_barang, $kode_barang, $nama_barang, $stok, $harga_beli, $harga_jual)
    {
        $stmt = $this->koneksi->prepare("update tb_barang set kode_barang = ?, nama_barang = ?, stok = ?, harga_beli = ?, harga_jual = ? where id_barang = ?");
        if (!$stmt) {
             return "Error prepare: " . $this->koneksi->error;
        }
        
        $stmt->bind_param("ssiddi", $kode_barang, $nama_barang, $stok, $harga_beli, $harga_jual, $id_barang);
        
        if (!$stmt->execute()) {
            $error = $stmt->error;
            $stmt->close();
            return "Error execute: " . $error;
        }
        
        $stmt->close();
        return true;
    }

    function delete_data($id_barang)
    {
        $stmt = $this->koneksi->prepare("delete from tb_barang where id_barang = ?");
        if (!$stmt) {
             echo "Error prepare: " . $this->koneksi->error;
             return;
        }
        
        $stmt->bind_param("i", $id_barang); 
        
        if (!$stmt->execute()) {
            echo "Error execute: " . $stmt->error;
        }
        
        $stmt->close();
    }

    function cari_data($nama_barang)
    {
        $hasil = [];
        $searchTerm = "%" . $nama_barang . "%"; 
        
        $stmt = $this->koneksi->prepare("select * from tb_barang where nama_barang LIKE ?");
        if (!$stmt) {
             echo "Error prepare: " . $this->koneksi->error;
             return $hasil;
        }
        
        $stmt->bind_param("s", $searchTerm);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $hasil[] = $row;
            }
        } else {
            echo "Error execute: " . $stmt->error;
        }
        
        $stmt->close();
        return $hasil;
    }
    
    /**
     * @param string $tipe_user Tipe user, cth: 'Administrator' atau 'Petugas'
     */
    function register_user($username, $password, $tipe_user = 'Petugas')
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $this->koneksi->prepare("INSERT INTO user (username, password, tipe_user) VALUES (?, ?, ?)");
        if (!$stmt) {
            return "Error prepare: " . $this->koneksi->error;
        }
        
        $stmt->bind_param("sss", $username, $hashed_password, $tipe_user);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $error = $stmt->error;
            $stmt->close();
            return "Error: " . $error;
        }
    }
    
    function login_user($username, $password)
    {
        if (!$this->koneksi) {
            error_log("Koneksi database gagal");
            return false;
        }

        if (empty($username) || empty($password)) {
            error_log("Username atau password kosong");
            return false;
        }

        try {
            $sql = "SELECT id_user, username, password, tipe_user AS level FROM user WHERE username = ?";
            $stmt = $this->koneksi->prepare($sql);
            
            if (!$stmt) {
                error_log("Gagal mempersiapkan query: " . $this->koneksi->error);
                return false;
            }
            
            $stmt->bind_param("s", $username);
            
            if (!$stmt->execute()) {
                error_log("Gagal mengeksekusi query: " . $stmt->error);
                $stmt->close();
                return false;
            }
            
            $result = $stmt->get_result();
            
            // Periksa apakah user ditemukan
            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                if ($password === $user['password']) {
                    $stmt->close();
                    return [
                        'id_user' => $user['id_user'],
                        'username' => $user['username'],
                        'level' => $user['level'] // 'level' ini berisi data dari 'tipe_user'
                    ];
                } else {
                    // Password salah
                    error_log("Password salah untuk user: " . $username);
                }
            } else {
                // User tidak ditemukan
                error_log("User tidak ditemukan: " . $username);
            }
            
            $stmt->close();
            return false;
            
        } catch (Exception $e) { // <-- Baris 'catch' Anda
            error_log("Error saat login: " . $e->getMessage());
            return false;
        }
    } // <-- Pastikan kurung ini ada
    
    function __destruct()
    {
        if ($this->koneksi) {
            $this->koneksi->close();
        }
    }

    function cetak_data() {
    $data = mysqli_query($this->koneksi, "SELECT * FROM tb_barang");
    $hasil = [];
    while ($row = mysqli_fetch_assoc($data)) {
        $hasil[] = $row;
    }
    return $hasil;
}

}
?>