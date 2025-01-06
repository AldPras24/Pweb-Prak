<?php
// Implementasikan logika penelusuran alumni berdasarkan input yang diberikan.
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    // Kode untuk mencari data alumni berdasarkan nama.
    echo "<p>Hasil pencarian untuk: <strong>" . htmlspecialchars($name) . "</strong></p>";
    // Tampilkan hasil penelusuran di sini.
}
?>