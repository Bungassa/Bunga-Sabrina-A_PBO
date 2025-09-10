<?php

// Data bangun ruang dalam array sederhana
$bangun_ruang = [
    ['Bola', 0, 7, 0],
    ['Kerucut', 0, 14, 10],
    ['Limas Segi Empat', 8, 0, 24],
    ['Kubus', 30, 0, 0],
    ['Tabung', 0, 7, 10],
];

echo "<h3>Data Volume Bangun Ruang";

// Bikin tabel
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>Nama Bangun</th>
        <th>Sisi</th>
        <th>Jari-jari</th>
        <th>Tinggi</th>
        <th>Volume</th>
      </tr>";

// Loop untuk isi tabel
foreach ($bangun_ruang as $b) {
    $nama = $b[0];
    $sisi = $b[1];
    $jari = $b[2];
    $tinggi = $b[3];
    $volume = 0;

    // Hitung volume sesuai nama bangun
    if ($nama == 'Bola') {
        $volume = (4/3) * 3.14 * ($jari * $jari * $jari);
    } elseif ($nama == 'Kerucut') {
        $volume = (1/3) * 3.14 * ($jari * $jari) * $tinggi;
    } elseif ($nama == 'Limas Segi Empat') {
        $volume = (1/3) * ($sisi * $sisi) * $tinggi;
    } elseif ($nama == 'Kubus') {
        $volume = $sisi * $sisi * $sisi;
    } elseif ($nama == 'Tabung') {
        $volume = 3.14 * ($jari * $jari) * $tinggi;
    }

    // Tampilkan dalam baris tabel
    echo "<tr>
            <td>$nama</td>
            <td>$sisi</td>
            <td>$jari</td>
            <td>$tinggi</td>
            <td>$volume</td>
          </tr>";
}

echo "</table>";

?>