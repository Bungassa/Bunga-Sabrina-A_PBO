<?php
class Karyawan {
    private $nama;
    private $golongan;
    private $jamLembur;
    private $gajiPokok;
    private $totalGaji;

    // Constructor
    public function __construct($nama, $golongan, $jamLembur) {
        $this->nama = $nama;
        $this->setGolongan($golongan);
        $this->jamLembur = $jamLembur;
        $this->hitungGaji();
    }

    // Setter & Getter untuk Golongan
    public function setGolongan($golongan) {
        $this->golongan = $golongan;
    }

    public function getGolongan() {
        return $this->golongan;
    }

    // Method hitung gaji (pakai array, looping, percabangan)
    private function hitungGaji() {
        // Array daftar golongan dengan gaji pokok
        $daftarGaji = [
            "Ib" => 1250000, "Ic" => 1300000, "Id" => 1350000,
            "IIa" => 2000000, "IIb" => 2100000, "IIc" => 2200000, "IId" => 2300000,
            "IIIa" => 2400000, "IIIb" => 2500000, "IIIc" => 2600000, "IIId" => 2700000,
            "IVa" => 2800000, "IVb" => 2900000, "IVc" => 3000000, "IVd" => 3100000
        ];

        // Perulangan untuk mencari gaji pokok sesuai golongan
        $this->gajiPokok = 0; // default
        foreach ($daftarGaji as $gol => $gaji) {
            if ($this->golongan == $gol) { // percabangan
                $this->gajiPokok = $gaji;
                break;
            }
        }

        // Hitung total gaji
        $this->totalGaji = $this->gajiPokok + ($this->jamLembur * 15000);
    }

    // Tampilkan hasil
    public function tampilkanGaji() {
        echo "----------------Gaji Karyawan---------------\n";
        echo "Nama Karyawan : {$this->nama}\n";
        echo "Golongan      : {$this->getGolongan()}\n";
        echo "Total Jam Lembur : {$this->jamLembur}\n";
        echo "Total Gaji    : Rp {$this->totalGaji}\n";
        echo "-------------------------------------------\n";
    }

    // Destructor
    public function __destruct() {
        echo "Perhitungan gaji selesai untuk karyawan {$this->nama}\n";
    }
}

// Input dari terminal (CLI)
echo "Masukkan Nama Karyawan: ";
$nama = trim(fgets(STDIN));

echo "Masukkan Golongan : ";
$golongan = trim(fgets(STDIN));

echo "Masukkan Total Jam Lembur: ";
$jamLembur = (int) trim(fgets(STDIN));

// Buat objek karyawan
$karyawan = new Karyawan($nama, $golongan, $jamLembur);

// Tampilkan hasil
$karyawan->tampilkanGaji();

?>