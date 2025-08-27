<?php

class Angsuran {
    public $pinjaman = 1000000;       
    public $bunga = 10;                
    public $totalPinjaman = 1100000;   
    public $lamaAngsuran = 5;          
    public $angsuran = 220000;         
    public $hariTelat = 40;            

    public function hitungDenda() {
        // aturan denda = 0.15% per hari dari angsuran
        return $this->hariTelat * (0.0015 * $this->angsuran);
    }

    public function hitungBesarPembayaran() {
        return $this->angsuran + $this->hitungDenda();
    }
}

// buat objek
$objek = new Angsuran();

// OUTPUT
echo "Keterlambatan Angsuran (Hari): " . $objek->hariTelat . "<br>";
echo "Denda Keterlambatan : Rp." . $objek->hitungDenda() . "<br>";
echo "Besaran Pembayaran : Rp." . $objek->hitungBesarPembayaran() . "<br>";
?>
