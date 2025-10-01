<?php

// ENCASULAPTION TABUNGAN SEKOLAH //

// Class Induk
class Tabungan {
    protected $nama;
    private $saldo;

    public function __construct($nama, $saldoAwal) {
        $this->nama = $nama;
        $this->saldo = $saldoAwal;
    }

    public function getNama() {
        return $this->nama;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function setor($jumlah) {
        if ($jumlah > 0) {
            $this->saldo += $jumlah;
            echo "{$this->nama} berhasil setor Rp$jumlah!!\n";
        } else {
            echo "Jumlah setor harus lebih dari 0!\n";
        }
    }

    public function tarik($jumlah) {
        if ($jumlah > 0 && $jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
            echo "{$this->nama} berhasil tarik Rp$jumlah!!\n";
        } else {
            echo "Saldo tidak cukup atau jumlah tidak valid!\n";
        }
    }
}

// Class Anak (Siswa)
class Siswa extends Tabungan {
    public function __construct($nama, $saldoAwal) {
        parent::__construct($nama, $saldoAwal);
    }
}


$siswa = [
    new Siswa("Siswa 1", 100000),
    new Siswa("Siswa 2", 150000),
    new Siswa("Siswa 3", 200000),
];

// Tampilkan saldo awal langsung
echo "==============================\n";
echo "  SALDO AWAL TABUNGAN SISWA\n";
echo "==============================\n";
foreach ($siswa as $s) {
    echo "{$s->getNama()} : Rp" . $s->getSaldo() . "\n";
}
echo "==============================\n";

// Loop menu program
while (true) {
    echo "\nPilih siswa:\n";
    echo "1. Siswa 1\n";
    echo "2. Siswa 2\n";
    echo "3. Siswa 3\n";
    echo "4. Keluar\n";
    echo "Pilihan Anda: ";

    $pilihan = trim(fgets(STDIN));

    if ($pilihan == 4) {
        echo "Terima kasih, program selesai.\n";
        break;
    }

    if (!isset($siswa[$pilihan - 1])) {
        echo "!! Pilihan tidak valid !!\n";
        continue;
    }

    $user = $siswa[$pilihan - 1];

    while (true) {
        echo "\n------------------------------\n";
        echo "Menu untuk {$user->getNama()}\n";
        echo "------------------------------\n";
        echo "1. Lihat Saldo\n";
        echo "2. Setor Tunai\n";
        echo "3. Tarik Tunai\n";
        echo "4. Kembali ke menu utama\n";
        echo "Pilihan Anda: ";

        $menu = trim(fgets(STDIN));

        switch ($menu) {
            case 1:
                echo "Saldo saat ini: Rp" . $user->getSaldo() . "\n";
                break;

            case 2:
                echo "Masukkan jumlah setor: ";
                $jumlah = trim(fgets(STDIN));
                $user->setor((int)$jumlah);
                break;

            case 3:
                echo "Masukkan jumlah tarik: ";
                $jumlah = trim(fgets(STDIN));
                $user->tarik((int)$jumlah);
                break;

            case 4:
                echo "Kembali ke menu utama...\n";
                break 2;

            default:
                echo "!! Pilihan tidak valid !!\n";
        }
    }
}
?>