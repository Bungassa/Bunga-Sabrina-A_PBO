<?php

Class BarangHarian {
    var $namaBarang = "Mie Instan";
    var $harga;
    var $jumlah;

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
$barang1-> harga = 15000;
$barang1-> jumlah = 2;

$barang2 = new BarangHarian();
$barang2 -> namaBarang = "Kopi";
$barang2 -> harga = 3000;
$barang2 -> jumlah = 5;

$barang3 = new BarangHarian();
$barang3 -> namaBarang = "Air Mineral";
$barang3 -> harga = 4000;
$barang3 -> jumlah = 3;

echo $barang1->namaBarang; echo " <br>";
echo $barang1->harga; echo "<br>";
echo $barang1->hitungTotalPembayaran(); echo "<br>"; echo "<br>";
echo $barang1->statusPembayaran(); echo "<br>"; echo "<br>";

echo $barang2->namaBarang; echo "<br>";
echo $barang2->harga; echo "<br>";
echo $barang2->hitungTotalPembayaran(); echo "<br>"; echo "<br>";

echo $barang3->namaBarang; echo "<br>";
echo $barang3->harga; echo "<br>";
echo $barang3->hitungTotalPembayaran(); echo "<br>"; echo "<br>";
echo $barang3->statusPembayaran(); echo "<br>"; echo "<br>";

$totalBelanja = $barang1->hitungTotalPembayaran() + $barang2->hitungTotalPembayaran() + $barang3->hitungTotalPembayaran();

echo "<br> Total Belanja = Rp ". $totalBelanja;
?>
