<?php
class Kendaraan
{
    public $jumlahRoda = 4;
    public $warna;
    public $bahanBakar = "Premium";
    public $harga = 100000000;
    public $merek;
    public $tahunPembuatan = 2004;

    public function statusHarga()
    {
        if ($this->harga > 50000000) {
            $status = "Harga Kendaraan Mahal";
        } else {
            $status = "Harga Kendaraan Murah";
        }
        return $status;
    }
    function statusSubsidi()
    {
        if ($this->tahunPembuatan < 2005 && $this->bahanBakar == "Premium") {
            $status = "DAPAT SUBSIDI";
        } else {
            $status = "TIDAK DAPAT SUBSIDI";
        }
        return $status;
    }
}
//instansiasi kelas
$ObjekKendaraan = new Kendaraan(); //pembuatan objek dari kelas
echo "jumlahRoda : " . $ObjekKendaraan->jumlahRoda . "<br />"; //proses instansiasi/pemanggilan variable
echo "statusHarga : " . $ObjekKendaraan->statusHarga() . "<br />"; //proses instansiasi/pemanggilan function dari kelas
echo "statusSubsidi : " . $ObjekKendaraan->statusSubsidi();
?>