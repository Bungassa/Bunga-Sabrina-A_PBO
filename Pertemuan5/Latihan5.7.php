<?php

//Materi Inheritance, overriding, overload dan constanta pada class

class warung {
    public $namaBarang;
    public $harga;

    public function __construct($namaBarang, $harga) {
        $this->namaBarang = $namaBarang;
        $this->harga = $harga;
    }

    public function informasi() {
        echo "Barang: $this->namaBarang, Harga: Rp $this->harga\n <br/>";
    }
}

$barang1 = new warung("susu", 6000);
$barang1->informasi();

?>