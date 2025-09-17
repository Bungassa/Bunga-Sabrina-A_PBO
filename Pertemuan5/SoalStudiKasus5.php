<?php

class Employee {
    public $namaPegawai;
    public $gajiPokok;
    public $lamaKerja; 

    public function __construct($namaPegawai, $gajiPokok, $lamaKerja) {
        $this->namaPegawai = $namaPegawai;
        $this->gajiPokok = $gajiPokok;
        $this->lamaKerja = $lamaKerja;
    }

    public function hitungGaji() {
        return $this->gajiPokok;
    }
}

class Programmer extends Employee {
    public function hitungGaji() {
        $gaji = parent::hitungGaji();
        if ($this->lamaKerja >= 1 && $this->lamaKerja <= 10) {
            $gaji += $this->gajiPokok * (0.01 * $this->lamaKerja);
        } elseif ($this->lamaKerja > 10) {
            $gaji += $this->gajiPokok * (0.02 * $this->lamaKerja);
        }
        return $gaji;
    }
}   

class Direktur extends Employee {
    public function hitungGaji() {
        $gaji = parent::hitungGaji();
        $gaji += $this->gajiPokok * (0.5 * $this->lamaKerja);
        $gaji += $this->gajiPokok * (0.1 * $this->lamaKerja);
        return $gaji;
    }
}

class PegawaiMingguan extends Employee {
    public $hargaBarang;
    public $stok;
    public $terjual;

    public function __construct($nama, $gajiPokok, $lamaKerja, $hargaBarang, $stok, $terjual) {
        parent::__construct($nama, $gajiPokok, $lamaKerja);
        $this->hargaBarang = $hargaBarang;
        $this->stok = $stok;
        $this->terjual = $terjual;
    }

    public function hitungGaji() {
        $gaji = parent::hitungGaji();
        $penjualan = $this->hargaBarang * $this->terjual;

        if ($this->terjual > (0.7 * $this->stok)) {
            $gaji += $penjualan * 0.10; // tambahan 10% dari total harga barang
        } else {
            $gaji += ($this->hargaBarang * 0.03) * $this->terjual; // bonus 3% tiap barang
        }

        return $gaji;
    }
}

echo "Hasil Studi Kasus Pertemuan 5<br/>";

// Contoh objek
$programmer = new Programmer("Bunga", 5000000, 5);
echo "<br> Gaji Programmer: " . $programmer->hitungGaji() . "<br>";

$direktur = new Direktur("Sabrina", 10000000, 3);
echo "Gaji Direktur: " . $direktur->hitungGaji() . "<br>";

$pegawaiMingguan = new PegawaiMingguan("Arini", 2000000, 2, 100000, 50, 20);
echo "Gaji Pegawai Mingguan: " . $pegawaiMingguan->hitungGaji() . "<br>";

?>
