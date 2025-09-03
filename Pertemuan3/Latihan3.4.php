<?php

Class BarangHarian {
    var $namaBarang = "Mie Instan";
    var $harga;
    var $jumlah;

    function setNamaBarang1($x) {
        $this->namaBarang = $x;
    }

    function getNamaBarang1() {
        return $this->namaBarang;
    }

    function setNamaBarang2($y) {
        $this->namaBarang = $y;
    }

    function getNamaBarang2() {
        return $this->namaBarang;
    }

    function setNamaBarang3($x) {
        $this->namaBarang = $x;
    }   

    function getNamaBarang3() {
        return $this->namaBarang;
    }

    function setHargaBarang1($x) {
        $this->harga = $x;
    }

    function getHargaBarang1() {
        return $this->harga;
    }

    function setHargaBarang2($y) {
        $this->harga = $y;
    }

    function getHargaBarang2() {
        return $this->harga;
    }

    function setHargaBarang3($x) {
        $this->harga = $x;
    }

    function getHargaBarang3() {
        return $this->harga;
    }
    

    function hitungTotalPembayaran() {
            $total = $this->harga * $this->jumlah;
            return $total;
    }

    function statusPembayaran() {
        $total = $this->hitungTotalPembayaran();
        if ($total > 50000) {
            return $status = "Mahal";
        } else {
            return $status = "Murah";
        }
    }

}

$barang1 = new BarangHarian();
$barang1-> setNamaBarang1("Mie Instan");
$barang1-> setHargaBarang1(15000);
$barang1-> jumlah = 2;

$barang2 = new BarangHarian();
$barang2 -> setNamaBarang2("Kopi");
$barang2 -> setHargaBarang2(3000);
$barang2 -> jumlah = 5;

$barang3 = new BarangHarian();
$barang3 -> setNamaBarang3("Air Mineral");
$barang3 -> setHargaBarang3(4000);
$barang3 -> jumlah = 3;

echo "<br> Nama Barang 1 : ". $barang1 -> getNamaBarang1();
echo "<br> Harga Barang 1 : Rp ". $barang1->getHargaBarang1(); 
echo "<br> Total Harga Barang 1: Rp ". $barang1->hitungTotalPembayaran(); echo "<br>";
echo "Status Harga Barang 1 : ". $barang1->statusPembayaran(); echo "<br>";

echo "<br> Nama Barang 2 : ". $barang2 -> getNamaBarang2(); 
echo "<br> Harga Barang 2 : Rp ". $barang2->getHargaBarang2(); 
echo "<br> Total Harga Barang 2 : Rp ". $barang2->hitungTotalPembayaran(); echo "<br>"; 
echo "Status Harga Barang 2 : ". $barang2->statusPembayaran(); echo "<br>";

echo "<br> Nama Barang 3 : ". $barang3 -> getNamaBarang3(); 
echo "<br> Harga Barang 3 : Rp ". $barang3->getHargaBarang3();
echo "<br> Total Harga Barang 3 : Rp ". $barang3->hitungTotalPembayaran(); echo "<br>";
echo "Status Harga Barang 3 : ". $barang3->statusPembayaran(); echo "<br>"; echo "<br>";

$totalBelanja = $barang1->hitungTotalPembayaran() + $barang2->hitungTotalPembayaran() + $barang3->hitungTotalPembayaran();

echo "<br> Total Belanja Keseluruhan : Rp ". $totalBelanja;
?>
