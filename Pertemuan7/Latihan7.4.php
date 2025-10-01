<?php
// buat class komputer
class komputer {
    // property dengan hak akses protected
    private $jenis_processor = "Intel Core i7-4790 3.6Ghz";
    protected $jenis_RAM = "DDR 4";
    public $jenis_VGA = "PCI Express";

    public function tampilkan_processor() {
        return $this->jenis_processor;
    }

    public function tampilkan_jenisprocessor() {
        return $this->jenis_processor;
    }

    private function tampilkan_ram() {
        return $this->jenis_RAM;
    }

    protected function tampilkan_VGA() {
        return $this->jenis_VGA;
    }

    public function tampilkan_VGA2() {
        return $this->jenis_VGA;
    }
}

// buat class laptop
class laptop extends komputer {
    public function display_processor() {
        return $this->jenis_processor;
    }

    public function display_processor2() {
        return $this->tampilkan_processor();
    }

    public function display_ram() {
        return $this->jenis_RAM;
    }

    public function display_ram2() {
        return $this->tampilkan_ram();
    }

    public function display_vga() {
        return $this->tampilkan_VGA();
    }

    private function display_processorkomputer() {
        return $this->jenis_processor;
    }
}

// buat objek dari class laptop (instansiasi)
$komputer = new komputer();
$laptop = new laptop();

// jalankan method dari class komputer
echo "Line 61 = ".$laptop->tampilkan_processor()."<br />";
echo "Line 62 = ".$laptop->display_processor()."<br />";
echo "Line 63 = ".$laptop->display_processor2()."<br />";
echo "Line 64 = ".$laptop->display_ram()."<br />";
echo "Line 65 = ".$laptop->display_ram2()."<br />";
echo "Line 66 = ".$laptop->display_vga()."<br />";
echo "Line 67 = ".$laptop->display_processorkomputer()."<br />";
?>

