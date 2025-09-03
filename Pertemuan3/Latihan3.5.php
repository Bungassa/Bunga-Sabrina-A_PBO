<?php

$nilai = 88;

if ($nilai > 90) {
    $grade = "A+";
} elseif ($nilai > 80) {
    $grade = "A";
} elseif ($nilai > 70) {
    $grade = "B";
} elseif ($nilai > 60) {
    $grade = "C+";
} elseif ($nilai > 50) {
    $grade = "C";
} elseif ($nilai > 40) {
    $grade = "D";
} elseif ($nilai > 30) {
    $grade = "E";
} elseif ($nilai > 20) {
    $grade = "E-";
} else {
    $grade = "F";
}

echo "Nilai anda: $nilai<br>";
echo "Grade: $grade";

?>
