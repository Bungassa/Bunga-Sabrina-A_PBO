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

class warung2 extends warung {
    public $exp;

    public function __construct($namaBarang, $harga, $exp) {
        parent::__construct($namaBarang, $harga);
        $this->exp = $exp;
    }

    //overriding
    public function Informasi() {
        echo "Barang2: $this->namaBarang, Harga: Rp $this->harga, Kadaluarsa: $this->exp <br/>";
    }
}

class warung3 {
    public function __call($namaBarang, $x){
        if($namaBarang == 'total') {
            if (count($x) == 1) {
                return $x[0];
            } 
            elseif (count($x) == 2) {
                return $x[0]* $x[1];
            } else {
                return 0;
            }
        }
    }

}

$barang1 = new warung("susu", 6000);
$barang1->informasi();

$barang2 = new warung2("yoghurt", 12000, "15-11-2025");
$barang2->informasi();

$barang3 = new warung3();
echo "Harga Indomie Setelah Diskon : Rp" . $barang3->total(4000). "<br/>";
echo "Harga Telur : Rp" . $barang3->total(2000, 5). "<br/>";

?>