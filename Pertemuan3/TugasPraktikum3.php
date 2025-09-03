<?php
class DiskonKartu {
    var $nama;
    var $kartu;        
    var $totalBelanja; 
    var $diskon;

    function hitungDiskon() {
        $this->diskon = 0;

        if ($this->kartu == "Memiliki") { 
            if ($this->totalBelanja > 500000) {
                $this->diskon = 50000;
            } elseif ($this->totalBelanja > 100000) {
                $this->diskon = 15000;
            }
        } else if ($this->kartu == "Tidak Memiliki") { 
            if ($this->totalBelanja > 100000) {
                $this->diskon = 5000;
            }
        }
        return $this->diskon;
    }
   
    function totalBayar() {
        return $this->totalBelanja - $this->hitungDiskon();
    }
}

$pembeli1 = new DiskonKartu();
$pembeli1->nama = "Pembeli 1";
$pembeli1->kartu = "Memiliki";
$pembeli1->totalBelanja = 200000;

$pembeli2 = new DiskonKartu();
$pembeli2->nama = "Pembeli 2";
$pembeli2->kartu = "Memiliki";
$pembeli2->totalBelanja = 570000;

$pembeli3 = new DiskonKartu();
$pembeli3->nama = "Pembeli 3";
$pembeli3->kartu = "Tidak Memiliki";
$pembeli3->totalBelanja = 120000;

$pembeli4 = new DiskonKartu();
$pembeli4->nama = "Pembeli 4";
$pembeli4->kartu = "Tidak Memiliki";
$pembeli4->totalBelanja = 90000;


echo "Nama Pembeli : ". $pembeli1->nama . "<br>";
echo "Kartu Member : ". $pembeli1->kartu . "<br>";
echo "Total Belanja : Rp " . $pembeli1->totalBelanja . "<br>";
echo "Diskon : Rp " . $pembeli1->hitungDiskon() . "<br>";
echo "Total Bayar : Rp " . $pembeli1->totalBayar() . "<br><br>";

echo "Nama Pembeli : ". $pembeli2->nama . "<br>";
echo "Kartu Member : ". $pembeli2->kartu . "<br>";
echo "Total Belanja : Rp " . $pembeli2->totalBelanja . "<br>";
echo "Diskon : Rp " . $pembeli2->hitungDiskon() . "<br>";
echo "Total Bayar : Rp " . $pembeli2->totalBayar() . "<br><br>";

echo "Nama Pembeli : ". $pembeli3->nama . "<br>";
echo "Kartu Member : ". $pembeli3->kartu . "<br>";
echo "Total Belanja : Rp " . $pembeli3->totalBelanja . "<br>";
echo "Diskon : Rp " . $pembeli3->hitungDiskon() . "<br>";
echo "Total Bayar : Rp " . $pembeli3->totalBayar() . "<br><br>";

echo "Nama Pembeli : ". $pembeli4->nama . "<br>";
echo "Kartu Member : ". $pembeli4->kartu . "<br>";
echo "Total Belanja : Rp " . $pembeli4->totalBelanja . "<br>";
echo "Diskon : Rp " . $pembeli4->hitungDiskon() . "<br>";
echo "Total Bayar : Rp " . $pembeli4->totalBayar() . "<br><br>";

?>
