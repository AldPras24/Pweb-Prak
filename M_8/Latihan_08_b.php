<h1>Informasi Alumni</h1>

<?php 
$namaAlumni = "Dede Irawan";
$tahunKelulusan = 2005;
$statusAktif = true;
$jumlahLulusan5Tahun = 300;
$tahunSekarang = date("Y");

$lamaKelulusan = $tahunSekarang - $tahunKelulusan;
$rasioAlumni = $jumlahLulusan5Tahun / 150; 

echo "<p>Lama Kelulusan: $lamaKelulusan tahun</p>";


$jumlahAlumni = 120;
$jumlahAlumni += 10;

if ($jumlahAlumni >= 130) {
    echo "<p>Jumlah alumni sudah mencukupi untuk acara reuni.</p>";
}


if ($statusAktif && $lamaKelulusan <= 5) {
    echo "<p>$namaAlumni adalah alumni aktif dan lulus dalam 5 tahun terakhir.</p>";
} else {
    echo "<p>$namaAlumni adalah alumni tidak aktif atau lulus lebih dari 5 tahun yang lalu.</p>";
}


echo "<p>Nama Lengkap: $namaAlumni</p>";
echo "<p>Nama dalam Huruf Besar: " . strtoupper($namaAlumni) . "</p>";
echo "<p>Nama dalam Huruf Kecil: " . strtolower($namaAlumni) . "</p>";

$initials = substr($namaAlumni, 0, 1) . substr($namaAlumni, strpos($namaAlumni, " ") + 1, 1);
echo "<p>Inisial: $initials</p>";
?>
