<?php
// Fungsi menghitung umur berdasarkan tanggal lahir
function hitung_umur($tanggal_lahir) {
    $tanggal_lahir = new DateTime($tanggal_lahir);
    $tanggal_sekarang = new DateTime();
    $umur = $tanggal_sekarang->diff($tanggal_lahir);
    return $umur->y;  // Mengembalikan umur dalam tahun
}

// Fungsi menentukan nilai huruf (A, B, C, D) berdasarkan nilai
function tentukan_nilai($nilai) {
    if ($nilai >= 85) {
        return 'A';
    } elseif ($nilai >= 70) {
        return 'B';
    } elseif ($nilai >= 50) {
        return 'C';
    } else {
        return 'D';
    }
}

// Data siswa
$siswa = [
    [
        'No' => 1,
        'Nama' => 'Pelita',
        'Tanggal Lahir' => '1997-12-27',
        'Umur' => '-',
        'Alamat' => 'Bandung',
        'Kelas' => 'Laravel',
        'Nilai' => 90,
        'Hasil' => '-'
    ],
    [
        'No' => 2,
        'Nama' => 'Najmina',
        'Tanggal Lahir' => '1998-10-07',
        'Umur' => '-',
        'Alamat' => 'Jakarta',
        'Kelas' => 'Vue JS',
        'Nilai' => 55,
        'Hasil' => '-'
    ],
    [
        'No' => 3,
        'Nama' => 'Anita',
        'Tanggal Lahir' => '1997-12-27',
        'Umur' => '-',
        'Alamat' => 'Semarang',
        'Kelas' => 'Design',
        'Nilai' => 80,
        'Hasil' => '-'
    ],
    [
        'No' => 4,
        'Nama' => 'Bayu',
        'Tanggal Lahir' => '1990-01-01',
        'Umur' => '-',
        'Alamat' => 'Bandung',
        'Kelas' => 'DMarket',
        'Nilai' => 65,
        'Hasil' => '-'
    ],
    [
        'No' => 5,
        'Nama' => 'Nasa',
        'Tanggal Lahir' => '1995-04-10',
        'Umur' => '-',
        'Alamat' => 'Bandung',
        'Kelas' => 'UI/UX',
        'Nilai' => 70,
        'Hasil' => '-'
    ],
    [
        'No' => 6,
        'Nama' => 'Rahma',
        'Tanggal Lahir' => '1993-09-15',
        'Umur' => '-',
        'Alamat' => 'Yogyakarta',
        'Kelas' => 'Node JS',
        'Nilai' => 85,
        'Hasil' => '-'
    ]
];

// Menghitung umur dan menentukan hasil nilai untuk setiap siswa
foreach ($siswa as $key => $student) {
    $siswa[$key]['Umur'] = hitung_umur($student['Tanggal Lahir']);
    $siswa[$key]['Hasil'] = tentukan_nilai($student['Nilai']);
}

// Menampilkan data dalam bentuk tabel
echo "<table border='1'>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Umur</th>
        <th>Alamat</th>
        <th>Kelas</th>
        <th>Nilai</th>
        <th>Hasil</th>
    </tr>";

foreach ($siswa as $student) {
    echo "<tr>";
    foreach ($student as $key => $value) {
        echo "<td>$value</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>
