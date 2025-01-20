<?php
// Mengecek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $tinggi_badan = $_POST['tinggi_badan'];
    $berat_badan = $_POST['berat_badan'];

    // Menghitung BMI
    $tinggi_badan_meter = $tinggi_badan / 100; // konversi cm ke meter
    $bmi = $berat_badan / ($tinggi_badan_meter * $tinggi_badan_meter);

    // Menentukan kategori BMI
    if ($bmi < 18.5) {
        $kategori = "Kurus";
    } elseif ($bmi >= 18.5 && $bmi < 25) {
        $kategori = "Sedang";
    } else {
        $kategori = "Gemuk";
    }

    // Menampilkan hasil
    echo "Halo, $nama. Nilai BMI anda adalah " . round($bmi, 2) . ", Anda termasuk kategori: $kategori.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan BMI</title>
</head>
<body>
    <h2>Perhitungan BMI</h2>
    <form method="POST" action="">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="tinggi_badan">Tinggi Badan (cm):</label><br>
        <input type="number" id="tinggi_badan" name="tinggi_badan" required><br><br>

        <label for="berat_badan">Berat Badan (kg):</label><br>
        <input type="number" id="berat_badan" name="berat_badan" required><br><br>

        <input type="submit" value="Hitung BMI">
    </form>
</body>
</html>
