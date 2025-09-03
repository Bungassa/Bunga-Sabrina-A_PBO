<?php
class kendaraan
{
    var $jumlahRoda;
    var $warna;
    var $bahanBakar;
    var $harga;
    var $merek;

    function statusHarga()
    {
        if ($this->harga > 50000000) $status = 'Mahal';
        else $status = 'Murah';
        return $status;
    }
}

$ObjekKendaraan1 = new kendaraan();
$ObjekKendaraan1->merek = "Yamaha Mio";      // set properti
$ObjekKendaraan1->harga = 10000000;         // set properti

$ObjekKendaraan2 = new kendaraan();
$ObjekKendaraan2->merek = "Toyota Avanza";  // set properti
$ObjekKendaraan2->harga = 100000000;        // set properti

echo "Merek : " . $ObjekKendaraan2->merek;  
echo "<br>";
echo "Nominal Harga : " . $ObjekKendaraan2->harga; 
echo "<br>";
echo "Status Harga Kendaraan : " . $ObjekKendaraan2->statusHarga();
?>
