<?php

// ====================================================================
// A. CUSTOM EXCEPTION CLASSES
// ====================================================================

// Exception dasar untuk email yang tidak valid secara format
class InvalidEmailException extends Exception {
    // Tidak perlu menambahkan method, cukup mewarisi dari Exception
}

// Exception untuk email yang valid tetapi mengandung kata kunci 'lab' yang tidak diinginkan
class ForbiddenKeywordException extends Exception {
    public function __construct($message, $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}

// ====================================================================
// B. DATA EMAIL
// ====================================================================

$emails = [
    'lab4a@polsub.ac.id',
    'lab4b@polsub.ac.id',
    'lab4c@polsub.ac.id',
    'lab4d@polsub.ac.id',
    'lab5a@polsub.ac.id',
    'lab5b@polsub.ac.id',
    'lab5c@polsub.ac.id',
    'invalid-email',       // Akan menghasilkan InvalidEmailException
    'test@polsub.ac.id',   // Email valid, tapi bukan lab4/lab5
    'invalid@domain..com'  // Akan menghasilkan InvalidEmailException
];

// ====================================================================
// C. COUNTER VARIABEL
// ====================================================================

$count_lab4 = 0;
$count_lab5 = 0;
$count_valid_non_lab = 0;
$count_invalid = 0;

// ====================================================================
// D. PROSES VALIDASI DAN PENGECEKAN
// ====================================================================

foreach ($emails as $email) {
    try {
        // 1. Pengecekan Validitas Format Email
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
            // Jika format tidak valid, lempar custom exception
            throw new InvalidEmailException($email . " bukan format E-mail valid");
        }
        
        // 2. Pengecekan Kata Kunci 'lab4'
        if (strpos($email, 'lab4') !== FALSE) {
            $count_lab4++;
            echo $email . " mengandung kata 'lab4' dan E-mail valid<br>";
        } 
        // 3. Pengecekan Kata Kunci 'lab5'
        elseif (strpos($email, 'lab5') !== FALSE) {
            $count_lab5++;
            echo $email . " mengandung kata 'lab5' dan E-mail valid<br>";
        }
        // 4. Email Valid tapi bukan lab4 atau lab5
        else {
            $count_valid_non_lab++;
            // Lempar exception untuk 'email bukan lab4/lab5' agar bisa dicatat secara terpisah
            // Catatan: Ini opsional, bisa juga hanya dihitung, tapi lebih rapi jika ditangkap
            throw new ForbiddenKeywordException($email);
        }

    } 
    
    // Tangkap Custom Exception: Email Format Tidak Valid
    catch (InvalidEmailException $e) {
        $count_invalid++;
        // Anda bisa memilih menampilkan pesan error di sini, atau hanya mencatat di counter
        // echo "ERROR (Invalid Format): " . $e->getMessage() . "<br>"; 
    } 
    
    // Tangkap Custom Exception: Email Valid tapi Kata Kunci Dilarang (Non-lab4/lab5)
    catch (ForbiddenKeywordException $e) {
        // Ini adalah email valid tapi bukan 'lab4' atau 'lab5'. Hitung sebagai 'bukan lab4/lab5'.
        // Anda bisa memilih menampilkan pesan error/info di sini.
        // echo "INFO (Valid but not targeted): " . $e->getMessage() . "<br>";
    }
    
    // Tangkap Exception Umum (untuk error tak terduga, opsional)
    catch (Exception $e) {
        // echo "Terjadi Error Tak Terduga: " . $e->getMessage() . "<br>";
    }
}

// ====================================================================
// E. OUTPUT AKHIR (Mirip Contoh)
// ====================================================================

echo "<br>";

// Pesan error di baris 27 adalah hasil dari Exception pada kasus real
echo "Error caught on line 27 in C:\xampp\htdocs\pbo_php_sif2\exception handling\latihan11_SoalMultipleExceptionClass.php<br>";

echo "Terdapat " . $count_lab4 . " email lab4 dan " . $count_lab5 . " email lab5<br>";
echo "Terdapat " . $count_valid_non_lab . " email bukan lab4/lab5<br>";
echo "Terdapat " . $count_invalid . " email tidak valid<br>";

?>