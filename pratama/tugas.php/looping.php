<?php
// Jumlah baris yang ingin dicetak
$jumlah_baris = 8;

// Looping untuk setiap baris
for ($i  = 0; $i < $jumlah_baris; $i++) {
    // Looping untuk mencetak angka dari 0 hingga $i
    for ($j = 0; $j <= $i; $j++) {
        echo $j;
    }
    // Pindah ke baris berikutnya
    echo "\n <br>" ;
} 



// Loop untuk mencetak tabel
for ($i = 1; $i <= 10; $i++) {
    // Mencetak No
    echo $i . "\t";

    // Mencetak Nama
    echo "Nama ke " . $i . "\t";

    // Mencetak Kelas (dengan pola menurun)
    echo "Kelas " . (11 - $i) . "\n <br>";
}


?>