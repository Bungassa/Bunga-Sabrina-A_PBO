<?php

class warung{
    private $barang;

    public function __construct($barang){
        $this->barang = $barang;
    }

    public function Menampilkanbarang(){
        foreach($this->barang as $namaBarang => $harga){
            echo "- $namaBarang dengan harga Rp $harga\n <br/>";
        }
    }
}

$barang = [
    "Kecap"=> 3000,
    "Tepung Terigu"=> 4000
];

$barang1 = new warung ($barang);
$barang1 -> Menampilkanbarang();


?>